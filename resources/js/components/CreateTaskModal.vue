<template>
      <modal name="create-task-modal" classes="box" height="auto" @before-open="beforeOpen">
        <a href="" @click.prevent="$modal.hide('create-task-modal')">
            <i class="fas fa-times text-grey font-bold text-2xl absolute right-0 top-0 p-4 hover:text-red"></i>
        </a>
        <h2 class="title text-center py-4"> Create a task </h2>
        <form @submit.prevent="submit">
            <div>
                <div class="mb-4">
                    <input type="text" class="input" :class="form.errors.description ? 'is-invalid' : ''" name="description" v-model="form.description" required placeholder="Task description">
                    <span class="text-red text-sm my-1 block text-center" v-if="form.errors.description" v-text="form.errors.description[0]"></span>
                </div>
            </div>

            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Create task</button>
                    <button type="button" @click="$modal.hide('create-task-modal')" class="button danger">Cancel</button>
                </div>
            </div>
        </form>
    </modal>
</template>

<script>
import ProjectHubForm from './ProjectHubForm';

export default {
    data() {
        return {
            form: new ProjectHubForm({
                description: ''
            }),
            path: ''
        };
    },

    methods: {
        beforeOpen (event) {
            this.path = event.params.path;
        },
        submit() {
            this.form.submit(this.path)
            .then(response => location = response.data.message);
        }    
    }
}
</script>

<style>

</style>