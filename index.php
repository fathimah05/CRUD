<?php 
include_once('./Models/Student.php');

$students = Student::index();

if(isset($_POST['submit'])) {
    $response = Student::create([
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);

    setcookie('message',$response,time()+10);
    header("location: index.php");
}

if(isset($_POST['delete'])){
    $response = Student::delete($_POST['id']);
    setcookie('message',$response,time()+10);
    header("location: index.php");
}
?>
    <!-- alert -->
   <?php include('./layouts/alert.php');?>
 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="">
        <!-- header -->
        <div class="bg-pink-400 text-center p-3 text-xl text-white">data siswa</div>
        <!-- main -->
        <div class="flex">
            <!-- sidebar -->
            <div class="basis-1/4 p-2">
                <div class="bg-pink-200 m-3 p-3 rounded-lg">
                <form action="" method="POST">FORM INPUT
                    <!-- nama -->
                    <div class="mb-3 m-2">
                        <label for="">Nama</label>
                        <input type="text" name="name" id="name" placeholder="klik disini" class="rounded-lg text-center block w-full" >
                    </div>
                    <!-- nis -->
                    <div class="mb-3 m-2">
                        <label for="" >Nis</label>
                        <input type="number" name="nis" id="nis" placeholder="klik  disini" class="rounded-lg text-center block w-full">
                    </div>
                    <!-- button -->
                    <div class="grid gap-2">
                        <button type="submit" name="submit" class="bg-pink-500 rounded-lg hover:bg-pink-600 p-1 text-white">SUBMIT</button>
                    </div>
                    
                </form>
            </div>
            </div>
            <!-- content -->
            <div class="basis-3/4 p-2">
                <div class="bg-pink-200 p-3 m-3 rounded-lg">data siswa
                    <div class="">
                        <table class="w-full">
                            <thead class="text-center border border-pink-500 bg-pink-400 text-white">
                                <tr>
                                    <th class="px-6 py-3">No.</th>
                                    <th class="px-6 py-3">Nama</th>
                                    <th class="px-6 py-3">Nis</th>
                                    <th class="px-6 py-3">Confirm</th>
                                </tr>
                            </thead>

                            <tbody class="text-center border border-slate-500 ">
                                <?php foreach($students as $key => $student) : ?>
                                <tr class="border border-slate-400">
                                    <td class="px-6 py-3"><?= $key + 1 ?></td>
                                    <td class="px-6 py-3"><?= $student['name'] ?></td>
                                    <td class="px-6 py-3"><?= $student['nis'] ?></td>
                                    <td>
                                        <!-- detail -->
                                   <a href="detail.php?id=<?=$student['id'] ?>" class="text-white hover:bg-pink-500 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-pink-500">detail</a>
                                        <!-- edit -->
                                   <a href="edit.php?id=<?=$student['id'] ?>" class="text-white hover:bg-pink-400 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-pink-500">edit</a>
                                   <!-- hapus -->
                                        <form action="" method="POST" class="inline">
                                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                            <button class="bg-pink-500 hover:bg-pink-400 pt-2 pb-2 pl-3 pr-3 rounded-xl  text-white" name="delete" type="submit">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="bg-pink-500 p-3 text-center text-white">
                 &copy; copyright fathimah 2023 
    </div>
</body>
</html>