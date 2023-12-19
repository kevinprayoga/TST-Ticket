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
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $_POST['firstName'] ?? ''; ?>">
        </div>

        <!-- Capacity -->
        <div class="input-group-vertical my-3">
            <label for="capacity" class="form-label fw-bold">Passengers</label>
            <select class="form-select" aria-label="capacity" name="capacity">
                <option selected value=1>1 Person</option>
                <option value=2>2 Persons</option>
                <option value=3>3 Persons</option>
                <option value=4>4 Persons</option>
                <option value=5>5 Persons</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="d-flex mt-4 pt-2">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <p> ______________________________________________________________________________________________________________ </p>

    <!-- Show Table -->
    <div class="d-flex pl-4 w-75">
        <table class="table align-middle table-borderless">
            <thead>
                <tr class="table-primary">
                    <th scope="col"></th>
                    <th scope="col">Flight ID</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Schedule</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <form method="get" action="/booking">
                    <?php
                    $counter = 1;
                    foreach ($flights as $flight) :
                    ?>
                        <tr>
                            <th scope="row"><?= $counter; ?></th>
                            <td><?= $flight->id; ?></td>
                            <td><?= $flight->origin_id; ?></td>
                            <td><?= $flight->destination_id; ?></td>
                            <td><?= $flight->schedule; ?></td>
                            <td><?= $flight->duration; ?> hours</td>
                            <td>Rp <?= number_format($flight->price, 0, ',', '.'); ?></td>
                            <td>
                                <input type="hidden" name="flight_id" value=<?= $flight->id; ?>>
                                <input type="hidden" name="counter" value=<?= $count; ?>>
                                <button type="submit" class="btn btn-primary">Book Now</button>
                            </td>
                        </tr>
                    <?php
                        $counter += 1;
                    endforeach;
                    ?>
                </form>
            </tbody>
        </table>
    </div>
</div>