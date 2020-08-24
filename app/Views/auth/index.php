<br>
<br>
<br>
<h2>Data User</h2>
<a href="<?= base_url('/') ?>">Back</a>
 <table class='table table-striped' id="table1">
     <thead>
         <tr>
             <th>No</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Action</th>

         </tr>
     </thead>
     <tbody>
         <?php $no = 1;
            foreach ($users as $user) : ?>
             <tr>
                 <td><?= $no++; ?></td>
                 <td><?= $user['first_name']; ?></td>
                 <td><?= $user['last_name']; ?></td>
                 <td><?= $user['email']; ?></td>
                 <td>
                     <a href="<?= base_url('auth/edit_user') . '/' . $user['id_user']; ?>"> <span class="badge bg-success">Edit</span></a>
                 </td>
             </tr>
         <?php endforeach; ?>

     </tbody>
 </table>