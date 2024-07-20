<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Riwayat</h4>
    </div>
    <div class="card-body">
      <table id="example-table" class="table table-bordered">
        <thead>
          <tr>
            <th>Kode Riwayat</th>
            <th>Nama Pengguna</th>
            <th>Merk Skincare</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($history)) : ?>
            <?php foreach ($history as $row) : ?>
              <tr>
                <td>HIS - <?php echo $row->id; ?></td>
                <td><?php echo $row->pengguna; ?></td>
                <td><?php echo $row->skincare; ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="3">No history found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>