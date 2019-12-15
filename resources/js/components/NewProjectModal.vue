<template>
      <modal name="new-project-modal" classes="box" height="auto">
        <h2 class="title text-center py-4"> Create a project </h2>
        <form @submit.prevent="submit">
            <div>
                <div class="mb-4">
                    <input type="text" class="input" :class="form.errors.title ? 'is-invalid' : ''" name="title" v-model="form.title" required placeholder="Project title">
                    <span class="text-red text-sm my-1 block text-center" v-if="form.errors.title" v-text="form.errors.title[0]"></span>
                </div>
            </div>

            <div>
                <div class="mb-4">
                    <textarea rows="3" class="textarea input" :class="form.errors.title ? 'is-invalid' : ''" v-model="form.description" required placeholder="Project description" name="description"></textarea>
                    <span class="text-red text-sm my-1 block text-center" v-if="form.errors.description" v-text="form.errors.description[0]"></span>
                </div>
            </div>

            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Create project</button>
                    <button type="button" @click="$modal.hide('new-project-modal')" class="button danger">Cancel</button>
                </div>
            </div>
        </form>
    </modal>
</template>

<script>
export default {
    data() {
        return {
            form: {
                title: '',
                description: ''
            }
        };
    },

    methods: {
        submit() {
            axios.post('/projects', this.form).then(response => {
                location = response.data.message;
            }).catch(error => {
                this.errors = error.response.data.errors;
            });
        }
    }
}
</script>

<style>

</style>