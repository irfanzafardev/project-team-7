<?php
include_once 'classes/Product.php';
include_once 'classes/Transaction.php';
include_once 'classes/Auth.php';
include 'assets/icons.php';

session_start();

if (!isset($_SESSION['user_data'])) {
    header('location: login.php');
}

$user_data = json_decode($_SESSION['user_data'], true);
$name = $user_data['nama_lengkap'];

$transactionClass = new Transaction();
$productClass = new Product();
$authClass = new Auth();
$no = 0;

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteProduct = $productClass->deleteProduct($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $logout = $authClass->logout($_POST);
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
    <header>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Welcome, <span><?= $name ?></span>!</h1>
                    <p class="mt-1.5 text-sm text-gray-500">It's our simple transactional app</p>
                </div>

                <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                    <button class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-gray-200 px-5 py-3 text-gray-500 transition hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:ring" type="button">
                        <span class="text-sm font-medium"> View Source Code </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </button>

                    <form method="POST" action="">
                        <button type="submit" class="block rounded-lg bg-indigo-900 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring">Log out</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="bg-white">
            <div class="mx-auto max-w-screen-xl px-4 py-6 sm:px-6 md:py-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                        Stats
                    </h2>
                </div>
                <div class="mt-4 sm:mt-12">
                    <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                        <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">
                            <dt class="order-last text-lg font-medium text-gray-500">
                                Total Sales
                            </dt>

                            <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">
                                <?php
                                $totalTransactions = $transactionClass->totalTransaction();
                                $result = mysqli_fetch_assoc($totalTransactions);
                                ?>
                                Rp<?= $result['total'] ?>
                            </dd>
                        </div>

                        <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">
                            <dt class="order-last text-lg font-medium text-gray-500">
                                Sales count
                            </dt>

                            <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">
                                <?php
                                $countTransaction = $transactionClass->countTransaction();
                                $result = mysqli_fetch_assoc($countTransaction);
                                ?>
                                <?= $result['count'] ?>
                            </dd>
                        </div>

                        <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">
                            <dt class="order-last text-lg font-medium text-gray-500">
                                Total Products
                            </dt>

                            <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">
                                <?php
                                $countProduct = $productClass->countProduct();
                                $result = mysqli_fetch_assoc($countProduct);
                                ?>
                                <?= $result['count'] ?>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>
        <section class="bg-white">
            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Product List</h1>
                <p class="mt-1.5 mb-10 text-sm text-gray-500">list of our product</p>
                <a class="rounded-md bg-indigo-900 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-800" href="create.php">+ Add data</a>
                <a class="rounded-md bg-indigo-900 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-800" href="index.php">See all transactions</a>
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm mt-10">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">#</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama produk</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Harga</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Satuan</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Keterangan</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Aksi</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <?php
                        $products = $productClass->index();

                        while ($result = mysqli_fetch_assoc($products)) {
                        ?>
                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 text-center font-medium text-gray-900"><?php echo ++$no; ?></td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700"><?php echo $result['nama_barang']; ?></td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700"><?php echo $result['harga']; ?></td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700"><?php echo $result['satuan']; ?></td>
                                <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700"><?php echo $result['keterangan']; ?></td>
                                <td class="whitespace-nowrap px-4 py-2 text-center">
                                    <a href="edit.php?edit=<?= $result['id'] ?>" class="inline-block rounded bg-indigo-900 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                        <?php
                                        echo $editIcons;
                                        ?>
                                    </a>
                                    <a href="?delete=<?= $result['id'] ?>" class="inline-block rounded bg-indigo-900 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700" onclick="return confirm('Are you sure want to delete this record?')">
                                        <?php
                                        echo $deleteIcons;
                                        ?>
                                    </a>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>

</html>