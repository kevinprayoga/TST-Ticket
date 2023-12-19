<div class="d-flex w-100 mt-5 align-items-center flex-column">
    <div class="text-center border bg-primary-subtle border w-100">
        <div class="d-flex justify-content-center align-items-center w-100">
            <div class="col"><a class="d-inline-flex align-items-center text-black text-decoration-none focus-ring fw-semibold" href="/history/success">
                    Success
                </a></div>
            <div class="col"><a class="d-inline-flex align-items-center text-black text-decoration-none focus-ring fw-semibold" href="/history/pending">
                    Pending
                </a></div>
            <div style="height: 50px" class="d-flex col justify-content-center bg-primary">
                <a class="d-inline-flex align-items-center text-white text-decoration-none focus-ring fw-semibold" href="/history/failed">
                    Failed
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-5 w-75">
        <div class="col">
            <?php
            $counter_failed = 0;
            foreach ($booking as $item) : ?>
                <?php if (($item->status === 'Failed')) : ?>
                    <div class="bg-body-tertiary rounded-3 p-3 link-body-emphasis d-flex flex-column gap-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column gap-2">
                                <h5 class="fw-bold">ID Booking:</h5>
                                <h5><?= esc($item->booking_id); ?></h5>
                            </div>
                            <img src="../plane.png" alt="plane" height="100" weight="100" class="mr-5">
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h5 class="fw-bold">Price:</h5>
                            <h5>Rp<?= esc($item->price); ?></h5>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex flex-column gap-2">
                                <h5 class="fw-bold">Created:</h5>
                                <h5><?= esc($item->created_at); ?></h5>
                            </div>
                            <h5 class="bg-dark-subtle text-white px-4 py-2 rounded-3 fw-semibold"><?= esc($item->status); ?></h5>
                        </div>
                    </div>
                <?php
                    $counter_failed += 1;
                endif; ?>
            <?php endforeach; ?>
            <?php if ($counter_failed === 0) : ?>
                <h3 class="text-center">The data is not available.</h3>
            <?php endif; ?>
        </div>
    </div>
</div>