<div class="d-flex flex-column align-items-center p-2">
    <p class="fw-bold fs-3">Book Flights to Your Dreamland Now!</p>

    <!-- Search Bar -->
    <form class="d-flex justify-content-center align-items-center bg-primary-subtle p-2 w-75 gap-4" method="get" action="/search">

        <!-- Airports-->
        <div class="d-flex gap-2 w-50 fw-bold">
            <div class="input-group-vertical">
                <label for="origin" class="form-label">From</label>
                <select class="form-select" aria-label="origin" name="origin">
                    <option selected disabled hidden>Pick an Airport</option>
                    <?php foreach ($airports as $airport) : ?>
                        <option value="<?= $airport->iata; ?>"><?= $airport->iata; ?> - <?= $airport->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group-vertical">
                <label for="destination" class="form-label">To</label>
                <select class="form-select" aria-label="destination" name="destination">
                    <option selected disabled hidden>Pick an Airport</option>
                    <?php foreach ($airports as $airport) : ?>
                        <option value="<?= $airport->iata; ?>"><?= $airport->iata; ?> - <?= $airport->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Date -->
        <div class="my-3">
            <label for="date" class="form-label fw-bold">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="<?= "2023-12-19"; ?>">
        </div>

        <!-- Capacity -->
        <div class="input-group-vertical my-3">
            <label for="capacity" class="form-label fw-bold">Passengers</label>
            <select class="form-select" aria-label="capacity" name="capacity">
                <?php for ($i = 1; $i < 6; $i++) : ?>
                    <option value=<?= $i; ?>><?= $i; ?> Person</option>
                <?php endfor; ?>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="d-flex mt-4 pt-2">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>