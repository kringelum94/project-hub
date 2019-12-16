<template>
    <div class="flex items-center mr-6">
        <button v-for="(color, theme) in themes"
            :key="theme"
            class="rounded-full w-4 h-4 bg-page focus:outline-none mr-2 border border-green"
            :style="{ backgroundColor: color}" 
            @click="selectedTheme = theme">
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                themes: {
                    'theme-light': 'white',
                    'theme-dark': '#272727'
                },
                selectedTheme: 'theme-light'
            };
        },

        created() {
            this.selectedTheme = localStorage.getItem('theme') || 'theme-light';
        },

        watch: {
            selectedTheme() {
                document.body.className = document.body.className.replace(/theme-\w+/, this.selectedTheme);

                localStorage.setItem('theme', this.selectedTheme);
            }
        }
    }
</script>
