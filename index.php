<?php
include 'connection.php';
include 'assets/icons.php';

$query = "SELECT * FROM `products`;";
$sql = mysqli_query($connection, $query);
$no = 0;

$result = mysqli_fetch_assoc($sql);
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
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Welcome Back, Barry!</h1>

                    <p class="mt-1.5 text-sm text-gray-500">Let's write a new blog post! 🎉</p>
                </div>

                <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                    <button class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-gray-200 px-5 py-3 text-gray-500 transition hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:ring" type="button">
                        <span class="text-sm font-medium"> View Source Code </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </button>

                    <button class="block rounded-lg bg-indigo-900 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring" type="button">Create Post</button>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="bg-white">
            <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 md:py-16 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                        Stats
                    </h2>

                    <p class="mt-4 text-gray-500 sm:text-xl">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit
                    </p>
                </div>

                <div class="mt-8 sm:mt-12">
                    <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                        <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">
                            <dt class="order-last text-lg font-medium text-gray-500">
                                Total Sales
                            </dt>

                            <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">
                                $4.8m
                            </dd>
                        </div>

                        <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">
                            <dt class="order-last text-lg font-medium text-gray-500">
                                Official Addons
                            </dt>

                            <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">24</dd>
                        </div>

                        <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">
                            <dt class="order-last text-lg font-medium text-gray-500">
                                Total Addons
                            </dt>

                            <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">86</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <a class="rounded-md bg-indigo-900 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-800" href="product-form.php">+ Add data</a>
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
                    foreach ($sql as $result) {
                    ?>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 text-center font-medium text-gray-900"><?php echo ++$no; ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700"><?php echo $result['nama_barang']; ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700"><?php echo $result['harga']; ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700"><?php echo $result['satuan']; ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-center text-gray-700"><?php echo $result['keterangan']; ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-center">
                                <a href="product-form.php?edit=<?php echo $result['id'] ?>" class="inline-block rounded bg-indigo-900 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    <?php
                                    echo $editIcons;
                                    ?>
                                </a>
                                <a href="controller.php?delete=<?php echo $result['id'] ?>" class="inline-block rounded bg-indigo-900 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700" onclick="return confirm('Are you sure want to delete this record?')">
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
    </main>
</body>

</html>