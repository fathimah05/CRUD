<?php



$id = $_GET['id'];
$student = student::show($id);

?>

<?php include('./layouts/top.php'); ?>
<?php include('./layouts/header.php'); ?>
<!-- Content -->
<div class="flex bg-slate-300 rounded-xl p-3 m-3">
    <div class="basis-1/5">
        <p class="font-bold">Name</p>
        <p class="font-bold">Nis</p>
</div>
<div class="basis-4/5">
    <p><?= $student['name'] ?></p>
    <p><?= $student['nis'] ?></p>
  </div>
</div>
<div class="grid gap-2"></div>

<a href="index.php">
    <div class="bg-slate-400 w-full rounded-xl p-3 text-center hover:bg-slate-300">
</div>
<?php include_once './layouts/footer.php'; ?>
<?php include_once './layouts/bottom.php'; ?>


        
