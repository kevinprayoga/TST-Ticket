<?php
$kode = ['CGK', 'LOP', 'LMA', 'OPI', 'SAN'];
?>

<div class="d-flex p-2 align-items-center flex-column">
    <p class="fw-bold fs-3">Book Flights to Your Dreamland Now!</p>
    <div class="d-flex p-2 bg-primary-subtle w-75 justify-content-center align-items-center gap-4">
        <div class="d-flex mb-3 mt-3 gap-2 fw-bold">
            <div class="input-group-vertical">
                <label class="form-label">From</label>
                <select class="form-select" id="Origin">
                    <option value="" disabled selected hidden>Pick an Airport</option>
                    <?php foreach ($kode as $airport) : ?>
                        <option value="<?= $airport; ?>"><?= $airport; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group-vertical">
                <label class="form-label">To</label>
                <select class="form-select" id="Destination">
                    <option value="" disabled selected hidden>Pick an Airport</option>
                    <?php foreach ($kode as $airport) : ?>
                        <option value="<?= $airport; ?>"><?= $airport; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label fw-bold">Depart Date</label>
            <input type="date" class="form-control" id="Date">
        </div>
        <div class="input-group-vertical mt-3 mb-3">
            <label class="form-label fw-bold"># Passengers</label>
            <select class="form-select" id="Capacity">
                <option selected value=1>1 Seat</option>
                <option value=2>2 Seats</option>
                <option value=3>3 Seats</option>
                <option value=4>4 Seats</option>
                <option value=5>5 Seats</option>
            </select>
        </div>
        <div class="d-flex mt-4 pt-2">
            <button type="button" class="btn btn-primary">Search</button>
        </div>
    </div>
    <p> _____________________________________________________________________________________________________________________________________________________ </p>
    <div class="d-flex pl-4 w-75">
        <table class="table align-middle table-borderless">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
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
                <tr>
                    <?php for ($i=0; $i < $kode; $i++) { 
                        # code...
                    } ?>
                    <th scope="row">1</th>
                    <td>TST808</td>
                    <td>GBK</td>
                    <td>SIA</td>
                    <td>19 April 2024 10.25 WIB</td>
                    <td>3 hours</td>
                    <td>Rp500.000</td>
                    <td>
                        <button type="button" class="btn btn-primary">Book Now</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>TST778</td>
                    <td>KGC</td>
                    <td>CGK</td>
                    <td>19 April 2024 13.00 WIB</td>
                    <td>2 hours</td>
                    <td>Rp450.000</td>
                    <td>
                        <button type="button" class="btn btn-primary">Book Now</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>