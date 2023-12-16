<script>
    import { router } from "@inertiajs/svelte";

    let form = {
        email: null,
        password: null,
    };

    function handle_submit() {
        router.post("/auth/authenticate", form);
    }
</script>

<div class="mx-auto mt-24 max-w-lg p-10">
    <header class="text-center">
        <h2 class="mb-1 text-2xl font-bold uppercase">Login</h2>
    </header>

    <form on:submit|preventDefault={handle_submit}>
        <div class="mb-6">
            <label for="email" class="mb-2 inline-block text-lg">Email</label>
            <input
                type="email"
                class="w-full rounded border border-gray-200 p-2"
                name="email"
                bind:value={form.email}
            />
        </div>

        <div class="mb-6">
            <label for="password" class="mb-2 inline-block text-lg"> Password </label>
            <input
                type="password"
                class="w-full rounded border border-gray-200 p-2"
                name="password"
                bind:value={form.password}
            />
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-black"
            >
                Sign In
            </button>
        </div>
    </form>
</div>
