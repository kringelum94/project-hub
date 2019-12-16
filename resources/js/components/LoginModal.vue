<template>
      <modal name="login-modal" classes="box bg-white relative" height="auto">
        <a href="" @click.prevent="$modal.hide('login-modal')">
            <i class="fas fa-times text-grey font-bold text-2xl absolute right-0 top-0 p-4 hover:text-red"></i>
        </a>
        <h2 class="title text-center py-4"> Login </h2>
        <form @submit.prevent="submit">
            <div>
                <div class="mb-4">
                    <input type="email" class="input" :class="form.errors.email ? 'is-invalid' : ''" name="email" v-model="form.email" required placeholder="E-mail" autocomplete="email">
                </div>
            </div>

            <div>
                <div class="mb-4">
                    <input type="password" class="input" :class="form.errors.email ? 'is-invalid' : ''" v-model="form.password" required placeholder="Password" name="password" autocomplete="current-password">
                    <span class="text-red text-sm my-1 block text-center" v-if="form.errors.email" v-text="form.errors.email[0]"></span>
                </div>
            </div>

            <div class="py-4">
                <div class="flex justify-around items-center">
                    <button type="submit" class="button">Login</button>
                    <a class="text-green font-medium" href="/password/reset">Forgot Your Password?</a>
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
                email: '',
                password: ''
            })
        };
    },

    methods: {
        async submit() {
            this.form.submit('/login')
            .then(response => location = response.data.message);
        }    
    }
}
</script>

<style>

</style>