<script>
    export let daily_schedules;
    // console.log(operation_hours);
    import { router } from "@inertiajs/svelte";
</script>

<form on:submit|preventDefault={() => router.post("/logout")}>
    <button type="submit">Logout</button>
</form>

<h1>Operation Hours</h1>

{#each daily_schedules as schedule}
    <div>
        <h2>{schedule.day_of_week}</h2>
        <p>{schedule.opening_time} - {schedule.closing_time}</p>
        <p>Full rate: ${schedule.rate.full_round_rate}</p>
    </div>
{/each}
