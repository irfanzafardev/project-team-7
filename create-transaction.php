<?php
include_once 'classes/Product.php';
include_once 'classes/Transaction.php';

session_start();

if (!isset($_SESSION['user_data'])) {
    header('location: login.php');
}

$productClass = new Product();
$transactionClass = new Transaction();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addTransaction = $transactionClass->addTransaction($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Team 7</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/dist/output.css" />
</head>

<body>
    <main>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Tambah Transaksi</h1>
                    <p class="mt-2 text-sm text-gray-700">Form input tambah data transaksi</p>
                </div>
            </div>
            <div class="space-y-10 divide-y divide-gray-900/10 mt-5">
                <form method="POST" enctype="multipart/form-data" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid gap-y-4">
                            <div class="col-span-full">
                                <label for="produk" class="block text-sm font-medium leading-6 text-gray-900">Produk<span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <select id="produk" name="produk" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <?php
                                        $products = $productClass->index();

                                        while ($result = mysqli_fetch_assoc($products)) {
                                        ?>
                                            <option value="<?php echo $result['nama_barang']; ?>"><?php echo $result['nama_barang']; ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="kuantitas" class="block text-sm font-medium leading-6 text-gray-900">Kuantitas<span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" id="kuantitas" name="kuantitas" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-describedby="tanggal-description" />
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="total" class="block text-sm font-medium leading-6 text-gray-900">Total<span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" id="total" name="total" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-describedby="tanggal-description" />
                                </div>
                            </div>

                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                <?php
                                if (isset($_GET['edit'])) {
                                ?>
                                    <button type="submit" name="action" value="edit" class="inline-flex w-full justify-center rounded-md bg-indigo-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 sm:ml-3 sm:w-auto">
                                        Update
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <button type="submit" name="action" value="store" class="inline-flex w-full justify-center rounded-md bg-indigo-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 sm:ml-3 sm:w-auto">
                                        Submit
                                    </button>
                                <?php
                                }
                                ?>
                                <a type="button" href="index.php" class="inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>