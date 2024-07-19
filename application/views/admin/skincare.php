<div class="row">
  <div class="d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <div class="mb-3 mb-sm-0">
            <h5 class="card-title fw-semibold">Data Skincare</h5>
          </div>
        </div>
        <?php if ($this->session->flashdata('success')) : ?>
          <div id="myAlert" class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
          <div id="myAlert" class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <div class="text-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
        </div>
        <table id="example-table" class="table table-bordered mt-3">
          <thead>
            <tr>
              <th>No</th>
              <th>Merk</th>
              <th>Detail</th>
              <th>Jenis Skincare</th>
              <th>Jenis Kulit</th>
              <th>Gambar</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $number = 1;
            foreach ($skincare as $item) : ?>
              <tr>
                <td><?= $number ?></td>
                <td><?= $item->merk; ?></td>
                <td><?= $item->detail; ?></td>
                <td><?= $item->jenis_skincare; ?></td>
                <td><?= $item->jenis_kulit; ?></td>
                <td><img src="<?= base_url('uploads/' . $item->gambar); ?>" alt="Gambar Skincare" width="50"></td>
                <td><?= 'Rp ' . number_format($item->harga, 0, ',', '.'); ?></td>
                <td>
                  <div class="d-flex justify-content-between">
                    <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $item->id; ?>">Edit</button>
                    <a href="<?php echo site_url('skincare/delete/' . $item->id); ?>" class="btn btn-danger btn-sm">Delete</a>
                  </div>
                </td>
              </tr>

              <!-- Edit Modal -->
              <div class="modal fade" id="editModal<?= $item->id; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel">Edit Skincare</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= site_url('skincare/update/' . $item->id); ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="merk" class="form-label">Merk</label>
                          <input type="text" class="form-control" name="merk" value="<?= $item->merk; ?>" required>
                        </div>
                        <div class="mb-3">
                          <label for="detail" class="form-label">Detail</label>
                          <textarea class="form-control" name="detail" required><?= $item->detail; ?></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="id_jenis_skincare" class="form-label">Jenis Skincare</label>
                          <select class="form-select" name="id_jenis_skincare" required>
                            <?php foreach ($jenis_skincare as $js) : ?>
                              <option value="<?= $js->id; ?>" <?= $item->id_jenis_skincare == $js->id ? 'selected' : ''; ?>><?= $js->nama; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="id_jenis_kulit" class="form-label">Jenis Kulit</label>
                          <select class="form-select" name="id_jenis_kulit" required>
                            <?php foreach ($jenis_kulit as $jk) : ?>
                              <option value="<?= $jk->id; ?>" <?= $item->id_jenis_kulit == $jk->id ? 'selected' : ''; ?>><?= $jk->nama; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="gambar" class="form-label">Gambar</label>
                          <input type="file" class="form-control" name="gambar">
                          <img src="<?= base_url('uploads/' . $item->gambar); ?>" alt="Gambar Skincare" width="50">
                        </div>
                        <div class="mb-3">
                          <label for="harga" class="form-label">Harga</label>
                          <input type="number" class="form-control" name="harga" value="<?= $item->harga; ?>" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php $number++;
            endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Tambah Skincare</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= site_url('skincare/insert'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" class="form-control" name="merk" required>
          </div>
          <div class="mb-3">
            <label for="detail" class="form-label">Detail</label>
            <textarea class="form-control" name="detail" required></textarea>
          </div>
          <div class="mb-3">
            <label for="id_jenis_skincare" class="form-label">Jenis Skincare</label>
            <select class="form-select" name="id_jenis_skincare" required>
              <?php foreach ($jenis_skincare as $js) : ?>
                <option value="<?= $js->id; ?>"><?= $js->nama; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="id_jenis_kulit" class="form-label">Jenis Kulit</label>
            <select class="form-select" name="id_jenis_kulit" required>
              <?php foreach ($jenis_kulit as $jk) : ?>
                <option value="<?= $jk->id; ?>"><?= $jk->nama; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar">
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>