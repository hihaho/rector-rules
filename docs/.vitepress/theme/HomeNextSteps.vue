<script setup lang="ts">
import { computed } from 'vue'
import { withBase } from 'vitepress'
import { homeSteps, slug } from '../pages'

const steps = computed(() => homeSteps.map((page, index) => ({
    ...page,
    step: `Step ${index + 1}`,
    href: withBase(`/${slug(page.file)}`),
})))

</script>

<template>
    <div class="doc-cta-grid">
        <a v-for="step in steps" :key="step.file" class="doc-cta-card" :href="step.href">
            <span class="doc-cta-label">{{ step.step }}</span>
            <span class="doc-cta-title">{{ step.text }}</span>
            <span class="doc-cta-text">{{ step.blurb }}</span>
        </a>
    </div>

    <div class="doc-cta-footer">
        <a class="doc-cta-button" :href="withBase('/code-quality')">Browse the rule sets</a>
        <span class="doc-cta-note">
            Want a rule that is not in a set? Start with
            <a :href="withBase('/named-argument-manifest')">the opt-in rules</a>.
        </span>
    </div>
</template>
