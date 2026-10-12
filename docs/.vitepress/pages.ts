/**
 * Single source of truth for the documentation order.
 *
 * Filenames keep their NN- prefix so GitHub renders docs/ in reading order;
 * `slug` strips the prefix so site URLs stay stable when pages are reordered.
 * `blurb` is what the end-of-page "Next" call to action shows, so it reads as
 * a reason to continue rather than a bare page title.
 */
export type DocPage = {
    file: string
    text: string
    blurb: string
}

export type DocSection = {
    text: string
    pages: DocPage[]
}

export const sections: DocSection[] = [
    {
        text: 'Getting started',
        pages: [
            {
                file: '01-why-rector-rules',
                text: 'Why hihaho/rector-rules?',
                blurb: 'What the rules rewrite, what they refuse to guess at, and when another tool is the right one.',
            },
            {
                file: '02-installation',
                text: 'Installation',
                blurb: 'Require the package, check the versions, and enable a set in rector.php.',
            },
            {
                file: '03-getting-started',
                text: 'Getting started',
                blurb: 'One dry run, reading the diff it prints, and keeping the codebase clean in CI.',
            },
        ],
    },
    {
        text: 'Rule sets',
        pages: [
            {
                file: '04-code-quality',
                text: 'Code quality',
                blurb: 'Named flag arguments, dropped default arguments, and the two rules with the most configuration.',
            },
            {
                file: '05-eloquent',
                text: 'Eloquent',
                blurb: 'Attribute conversions for collections and observers, and relation names as class constants.',
            },
            {
                file: '06-naming',
                text: 'Naming',
                blurb: 'The suffix each base class implies, and the classes the rules deliberately leave alone.',
            },
            {
                file: '07-routing',
                text: 'Routing',
                blurb: 'Normalized route paths and fluent route groups, gated to files under routes/.',
            },
            {
                file: '08-migrations',
                text: 'Migrations',
                blurb: 'Self-contained migrations, INSTANT DDL, and the MySQL-only flag-column conversion.',
            },
            {
                file: '09-imports',
                text: 'Imports',
                blurb: 'Aliasing the imports whose short names collide, and what happens when an alias is taken.',
            },
            {
                file: '10-testing',
                text: 'Testing',
                blurb: 'Table strings as model classes, and single-id existence checks as assertModelExists.',
            },
        ],
    },
    {
        text: 'Opt-in rules',
        pages: [
            {
                file: '11-named-argument-manifest',
                text: 'Named arguments from a manifest',
                blurb: 'Naming flags on receivers static analysis cannot see, and the cache that hides a fresh manifest.',
            },
            {
                file: '12-middleware-string-to-class',
                text: 'Middleware strings to classes',
                blurb: 'Laravel\'s class-based middleware form, and why auth, guest and throttle are excluded.',
            },
            {
                file: '13-test-field-constants',
                text: 'Test payload field names',
                blurb: 'Constants on internal endpoints, literals on public ones, and the config contract that decides which.',
            },
        ],
    },
]

/** Flat reading order — drives rewrites, the sidebar, and the "Next" call to action. */
export const pages: DocPage[] = sections.flatMap(section => section.pages)

export const slug = (file: string) => file.replace(/^\d+-/, '')

export const link = (file: string) => `/${slug(file)}`

/**
 * The three cards the home page shows under "Where to next".
 *
 * Resolved here rather than in the component: this module is imported while VitePress
 * loads its config, so a stale id fails the build. Thrown from inside the component it
 * would only be logged, and the section would render empty.
 */
export const homeSteps: DocPage[] = ['01-why-rector-rules', '02-installation', '03-getting-started'].map(file => {
    const page = pages.find(entry => entry.file === file)

    if (!page) {
        throw new Error(`Home page step "${file}" is missing from the documentation page list.`)
    }

    return page
})
