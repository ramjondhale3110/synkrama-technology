<div class="container">
    <div class="row">
        <div class="col-md-4 mt-3">
            <input type="number" class="form-control" name="searchDealer" placeholder="Enter Zip to Search Dealer">
        </div>
    </div>
    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">Sr. No</th>
                <th scope="col">Full Name</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Pincode</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 0;
            foreach ($userDealers as $userDealer) { ?>
                <tr>
                    <th scope="row"><?= ++$index ?></th>
                    <td><?= ucwords($userDealer->userFirstName . ' ' . $userDealer->userLastName) ?></td>
                    <td><?= $userDealer->userCity ?></td>
                    <td><?= $userDealer->userState ?></td>
                    <td><?= $userDealer->userZip ?></td>
                    <td>
                        <a href="<?= base_url('edit-dealer/') . $userDealer->id ?>" class="btn btn-primary"><i class="fa">&#9998;</i></a>
                    </td>
                <?php } ?>
                </tr>
        </tbody>
    </table>
</div>

<input type="hidden" name="baseUrl" value="<?= base_url() ?>">
<script>
    $(document).ready(function() {
        $(document).on('keypress', 'input[name="searchDealer"]', function() {
            const searchTerm = $(this).val();
            if (searchTerm != '') {
                $.ajax({
                    url: "<?= base_url('home/getDealerDetails') ?>",
                    method: "POST",
                    data: {
                        searchTerm: searchTerm
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
        });
    });
</script>