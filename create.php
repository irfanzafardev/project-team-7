<?php
include_once 'classes/Product.php';

$productClass = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addProduct = $productClass->addProduct($_POST);
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
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Tambah Produk</h1>
                    <p class="mt-2 text-sm text-gray-700">Form input tambah data produk</p>
                </div>
            </div>
            <div class="space-y-10 divide-y divide-gray-900/10 mt-5">
                <?php
                if ((isset($_GET['edit']))) {
                    $getProduct = $productClass->showProduct($id);
                    if ($getProduct) {
                        while ($result = mysqli_fetch_assoc($getProduct)) {
                ?>
                            <form method="PUT" enctype="multipart/form-data" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
                                <div class="px-4 py-6 sm:p-8">
                                    <div class="grid gap-y-4">
                                        <div class="col-span-full">
                                            <label for="nama_barang" class="block text-sm font-medium leading-6 text-gray-900">Nama produk<span class="text-red-500">*</span>
                                            </label>
                                            <div class="mt-2">
                                                <input type="text" id="nama_barang" name="nama_barang" value="<?= $result['nama_barang'] ?>" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-describedby="tanggal-description" />
                                                <InputError class="mt-2" :message="form.errors.tanggal" />
                                            </div>
                                        </div>
                                        <div class="col-span-full">
                                            <label for="harga" class="block text-sm font-medium leading-6 text-gray-900">Harga<span class="text-red-500">*</span>
                                            </label>
                                            <div class="mt-2">
                                                <input type="number" id="harga" name="harga" value="<?= $result['harga'] ?>" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-describedby="tanggal-description" />
                                                <InputError class="mt-2" :message="form.errors.tanggal" />
                                            </div>
                                        </div>
                                        <div class="col-span-full">
                                            <label for="satuan" class="block text-sm font-medium leading-6 text-gray-900">Satuan<span class="text-red-500">*</span>
                                            </label>
                                            <div class="mt-2">
                                                <select id="satuan" name="satuan" value="<?= $result['satuan'] ?>" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    <option value="pcs" selected="">pcs</option>
                                                    <option value="set">set</option>
                                                    <option value="box">box</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-span-full">
                                            <label for="keterangan" class=" block text-sm font-medium leading-6 text-gray-900">Keterangan<span class="text-red-500"></span>
                                            </label>
                                            <div class="mt-2">
                                                <textarea rows="4" name="keterangan" id="keterangan" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"><?= $result['keterangan'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                            <button type="submit" name="action" value="store" class="inline-flex w-full justify-center rounded-md bg-indigo-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 sm:ml-3 sm:w-auto">
                                                Submit
                                            </button>
                                            <a type="button" href="index.php" class="inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                Batal
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    <?php
                        }
                    }
                    ?>
                <?php

                } else {
                ?>
                    <form method="POST" enctype="multipart/form-data" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
                        <div class="px-4 py-6 sm:p-8">
                            <div class="grid gap-y-4">
                                <div class="col-span-full">
                                    <label for="nama_barang" class="block text-sm font-medium leading-6 text-gray-900">Nama produk<span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <input type="text" id="nama_barang" name="nama_barang" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-describedby="nama-description" />
                                        <InputError class="mt-2" :message="form.errors.tanggal" />
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="harga" class="block text-sm font-medium leading-6 text-gray-900">Harga<span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <input type="number" id="harga" name="harga" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-describedby="tanggal-description" />
                                        <InputError class="mt-2" :message="form.errors.tanggal" />
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="satuan" class="block text-sm font-medium leading-6 text-gray-900">Satuan<span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select id="satuan" name="satuan" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="pcs" selected="">pcs</option>
                                            <option value="set">set</option>
                                            <option value="box">box</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-full">
                                    <label for="keterangan" class="block text-sm font-medium leading-6 text-gray-900">Keterangan<span class="text-red-500"></span>
                                    </label>
                                    <div class="mt-2">
                                        <textarea rows="4" name="keterangan" id="keterangan" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
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
                <?php
                }
                ?>

            </div>
        </div>
    </main>
</body>

</html>