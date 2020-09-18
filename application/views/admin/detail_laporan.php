<div class="container-fluid">
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Nomor Pembayaran</th>
            <th>Nama Pelanggan</th>
            <th>Volume Air</th>
            <th>Nominal Pembayaran</th>
            <th>Status</th>
        </tr>

        <?php
        $no=1;
        foreach ($laporan as $lap) : ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $lap->no_tagihan ?></td>
                <td><?php echo $lap->nama ?></td>
                <td><?php echo $lap->volume ?></td>
                <td>Rp. <?php echo number_format($lap->nominal, 0, ',', '.'); ?></td>
                <td><?php echo $lap->status_tagihan ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>

