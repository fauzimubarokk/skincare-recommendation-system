<div class="row">
  <div class="d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <div class="mb-3 mb-sm-0">
            <h5 class="card-title fw-semibold">Data Pengguna</h5>
          </div>
        </div>
        <table id="example-table" class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>ID</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php $number = 1;
            foreach ($users as $user) : ?>
              <tr>
                <td><?= $number ?></td>
                <td>User-<?= $user->id ?></td>
                <td><?= $user->nama ?></td>
                <td><?= $user->jenis_kelamin ?></td>
                <td><?= $user->alamat ?></td>
                <td><?= $user->email ?></td>
              </tr>
            <?php $number++;
            endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>