import { mkdirSync, readFileSync, writeFileSync } from 'node:fs'
import { join } from 'node:path'
import { defineConfig } from 'vitepress'
import { link, pages, sections, slug } from './pages'

const site = 'https://hihaho.github.io/rector-rules/'

/**
 * A markdown link between source pages (`04-code-quality.md#anchor`) points at a file that only
 * exists in the repo. Rewritten to the published URL so a reader who has the plain-text copy can
 * follow it without guessing the route.
 */
const absoluteLinks = (markdown: string): string => markdown.replace(
    /\]\((\d+-[a-z-]+)\.md(#[a-z0-9-]*)?\)/g,
    (_, file: string, anchor = '') => `](${site}${slug(file)}${anchor})`,
)

const description = 'Rector rules that enforce the Hihaho Laravel conventions automatically: naming, routing, migration safety, Eloquent relations, named arguments and import aliasing.'

export default defineConfig({
    title: 'Hihaho Rector Rules',
    description,
    base: '/rector-rules/',
    cleanUrls: true,
    lastUpdated: true,

    // Lets search engines and agent crawlers enumerate the pages instead of
    // discovering them only by following links from the home page.
    sitemap: {
        hostname: site,
    },

    head: [
        ['meta', { name: 'theme-color', content: '#0d9488' }],
        ['meta', { property: 'og:type', content: 'website' }],
        ['meta', { property: 'og:title', content: 'Hihaho Rector Rules' }],
        ['meta', { property: 'og:description', content: description }],
    ],

    /**
     * Two plain-text builds beside the HTML, for readers that are not browsers.
     *
     * `llms-full.txt` is every page in reading order behind one URL, so an agent can take the whole
     * documentation in a single fetch instead of crawling thirteen pages of nav chrome. Each page is
     * also written as `<slug>.md`, for the reader that wants one page rather than all of them.
     * `public/llms.txt` stays hand-written: it is the index, and what an agent most needs up front is
     * the package's own rules, which no generator would write.
     */
    buildEnd: async ({ outDir, srcDir }) => {
        const parts: string[] = ['# Hihaho Rector Rules', '', `> ${description} Full documentation, ${pages.length} pages, in reading order. Index: ${site}llms.txt`, '']

        for (const page of pages) {
            const markdown = absoluteLinks(readFileSync(join(srcDir, `${page.file}.md`), 'utf-8'))

            mkdirSync(outDir, { recursive: true })
            writeFileSync(join(outDir, `${slug(page.file)}.md`), markdown)
            parts.push(`<!-- ${site}${slug(page.file)} -->`, '', markdown.trim(), '')
        }

        writeFileSync(join(outDir, 'llms-full.txt'), parts.join('\n'))
    },

    // README.md is the GitHub-facing folder index; the site's home is home.md.
    srcExclude: ['README.md'],

    rewrites: {
        'home.md': 'index.md',
        ...Object.fromEntries(pages.map(page => [`${page.file}.md`, `${page.file.replace(/^\d+-/, '')}.md`])),
    },

    markdown: {
        // Markdown links target the NN-prefixed source files so they work on
        // GitHub; strip the prefix at render time to match the rewritten routes.
        config(md) {
            const defaultRender = md.renderer.rules.link_open
                ?? ((tokens, idx, options, _env, self) => self.renderToken(tokens, idx, options))
            md.renderer.rules.link_open = (tokens, idx, options, env, self) => {
                const href = tokens[idx].attrGet('href')
                if (href && /^(\.\/)?\d+-/.test(href)) {
                    tokens[idx].attrSet('href', href.replace(/^(\.\/)?\d+-/, '$1'))
                }
                return defaultRender(tokens, idx, options, env, self)
            }
        },
    },

    themeConfig: {
        nav: [
            { text: 'Guide', link: link('01-why-rector-rules') },
            { text: 'Rule sets', link: link('04-code-quality') },
            { text: 'Releases', link: 'https://github.com/hihaho/rector-rules/releases' },
            { text: 'Packagist', link: 'https://packagist.org/packages/hihaho/rector-rules' },
        ],

        sidebar: sections.map(section => ({
            text: section.text,
            items: section.pages.map(page => ({ text: page.text, link: link(page.file) })),
        })),

        socialLinks: [
            { icon: 'github', link: 'https://github.com/hihaho/rector-rules' },
        ],

        docFooter: {
            next: false,
        },

        editLink: {
            pattern: 'https://github.com/hihaho/rector-rules/edit/main/docs/:path',
            text: 'Edit this page on GitHub',
        },

        search: {
            provider: 'local',
        },

        outline: {
            level: [2, 3],
        },
    },
})
