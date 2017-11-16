<?php include_once('includes/header.php'); ?>

<div class="container">
	<a class="pull-right" href="<?= base_url(); ?>Site_Login/logout">Logout</a>
  <h2>Total Registered Users</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Email</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach ($users as $user): ?>
      <tr>
        <td><?= $user['email']; ?></td>
        <td><?= $user['status']; ?></td>
      </tr>
  <?php endforeach; ?>

    </tbody>
  </table>
</div>

<?php include_once('includes/footer.php'); ?>

