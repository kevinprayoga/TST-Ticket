<div class="container mb-5">
    <div class="row">
        <div class="col">
            <h1>Booking</h1>
            <?php if(session()->getFlashdata('pesan')) : ?>  
                <div class="alert alert-danger" role='alert'>
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <form action="booking/save" method="post">
            <?= csrf_field(); ?>
            <?php
                
                $count = 1; //ini jumlah penumpang
                $flight_id = '22ddff'; //ini id penerbangan

                for ($i = 0; $i < $count; $i++) {
                    ?>
                    <input type="hidden" name="count" value="<?= $count; ?>">
                    <input type="hidden" name="fligt_id" value="<?= $flight_id; ?>">

                    <h3 class='fs-6 py-2 pt-3'>Penumpang <?=$i+1;?></h3>
                    <div class="mb-3">
                        <label for="honorifics" class="form-label">Honorifics</label>
                        <select class="form-select" aria-label="honorificts" name="honorifics[]" autofocus>
                            <option value="Mr">Mr.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Ms">Ms.</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name[]">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name[]">
                    </div>
                    <div class="mb-3">
                        <label for="id_number" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="id_number" name="id_number[]">
                    </div>
                    <?php
                }
            ?>
            <button type="submit" class="btn btn-primary">Booked</button>
            </form>
        </div>
    </div>
</div>
