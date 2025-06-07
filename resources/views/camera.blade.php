<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Klasifikasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-[#dbe6d1] font-sans">
    @include('components.navbar')

    <main class="px-3 mt-6">

        <section class="max-w-3xl mx-auto bg-white rounded-xl border border-gray-400 p-10 flex flex-col justify-center items-center">
    <img src="{{ asset('images/icon-image-outline.png') }}" alt="Image Placeholder" width="100" height="100" class="mb-6" />

    <form id="formKlasifikasi" action="{{ route('api.klasifikasi') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center gap-4">
        @csrf
        <input id="gambarInput" type="file" name="gambar" class="hidden" required>
        <label for="gambarInput" class="cursor-pointer bg-[#4f7543] text-white font-semibold text-sm rounded-full px-6 py-2 hover:bg-[#3f6134] transition">
            Upload Image
        </label>
    <div class="mt-10 text-center w-full">
        <button type="submit" form="formKlasifikasi" class="bg-[#4f7543] text-white text-xs rounded-full px-6 py-2 hover:bg-[#3f6134] transition">
            Mulai Klasifikasi
        </button>
    </div>
    </form>

    <div id="hasilKlasifikasi" class="mt-4 w-full text-center"></div>
</section>
        <section class="max-w-4xl mx-auto mt-10">
            <h2 class="text-xl font-bold mb-2">Riwayat Klasifikasi</h2>
            <table class="w-full border border-gray-300 text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Hasil</th>
                        <th class="border px-4 py-2">Gambar</th>
                        <th class="border px-4 py-2">Waktu</th>
                    </tr>
                </thead>
                <div class="flex justify-center mb-4">
                    <button class="bg-ijotuabg justify-center items-center text-white text-xs rounded-full px-6 py-4 hover:bg-green-600 mb-4" id="btnLihatHistory">
                        Refresh History
                        <i class="fas fa-history ml-2"></i>
                    </button>
                </div>
                <tbody id="tabelHistory">
                </tbody>
            </table>
        </section>
    </main>

    <script>
        const btnLihat = document.getElementById('btnLihatHistory');
const userId = '{{ auth()->user()->id }}';

if (btnLihat) {
    btnLihat.addEventListener('click', async () => {
        const response = await fetch(`/api/klasifikasi/history?id=${userId}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            credentials: 'same-origin',
        });

        const tbody = document.getElementById('tabelHistory');
        tbody.innerHTML = ''; 

        if (response.ok) {
            const data = await response.json();
            if (data.message) {
                const rowKosong = `
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-4">
                            ${data.message}
                        </td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', rowKosong);
                return;
            }
            let nomor = 1;
            data.forEach(item => {
                const row = `
                    <tr>
                        <td class="border px-4 py-2">${nomor++}</td>
                        <td class="border px-4 py-2">${item.hasil}</td>
                        <td class="border px-4 py-2">
                            <img src="${item.gambar}" alt="Gambar" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="border px-4 py-2">${new Date(item.created_at).toLocaleString()}</td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', row);
            });
        } else {
            const rowError = `
                <tr>
                    <td colspan="4" class="text-center text-red-500 py-4">
                        Gagal ambil history
                    </td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', rowError);
        }
    });
}

        document.getElementById('formKlasifikasi').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            const response = await fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });

            if (response.ok) {
                const data = await response.json();

                if (data.status === 'success') {
                    window.location.href = data.data.redirect_url;
                } else {
                    document.getElementById('hasilKlasifikasi').innerHTML =
                        `<p class="text-red-500">Gagal klasifikasi: ${data.message}</p>`;
                }
            } else {
                document.getElementById('hasilKlasifikasi').innerHTML =
                    `<p class="text-red-500">Gagal klasifikasi, coba lagi ya!</p>`;
            }
        });
    </script>
</body>

</html>
