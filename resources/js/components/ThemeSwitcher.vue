<template>
    <div>
        <button class="focus:outline-none text-grey font-medium pt-2 pb-1 px-4 w-full text-left hover:text-green" v-if="selectedTheme === 'theme-light'" @click="selectedTheme = 'theme-dark'">Switch to dark theme</button>
        <button class="focus:outline-none text-grey font-medium pt-2 pb-1 px-4 w-full text-left hover:text-green" v-if="selectedTheme === 'theme-dark'" @click="selectedTheme = 'theme-light'">Switch to light theme</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
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
