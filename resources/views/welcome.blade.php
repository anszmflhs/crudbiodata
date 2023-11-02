<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <h1 class="text-3xl m-4 font-bold text-black">
        Crud Biodata
    </h1>
    <a href="{{ url('/create') }}" class="ml-4 mr-4 mb-4 px-4 py-2 w-40 bg-blue-500 hover.bg-blue-700 text-white font-semibold font-sans block">
        Tambah Biodata
    </a>
    <table class="ml-4 mr-4 table-auto w-full">
        <thead>
            <th class="px-4 py-2">
                <div class="flex items-center">Name</div>
            </th>
            <th class="px-4 py-2">
                <div class="flex items-center">Photo</div>
            </th>
            <th class="px-4 py-2">
                <div class="flex items-center">Address</div>
            </th>
            <th class="px-4 py-2">
                <div class="flex items-center">Phone</div>
            </th>
            <th class="px-4 py-2">
                <div class="flex items-center">Email</div>
            </th>
            <th class="px-4 py-2">
                <div class="flex items-center">Action</div>
            </th>
        </thead>
        <tbody>
            @foreach ($biodatas as $bio)
                <tr>
                    <td class="border px-4 py-2">{{ $bio->name }}</td>
                    <td class="border px-4 py-2">
                        <img src="{{ asset('storage/' . $bio->photo) }}" alt="{{ $bio->name }}" width="100">
                    </td>
                    <td class="border px-4 py-2">{{ $bio->address }}</td>
                    <td class="border px-4 py-2">{{ $bio->phone }}</td>
                    <td class="border px-4 py-2">{{ $bio->email }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('biodata.edit', $bio->id) }}" class="mr-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('biodata.delete', $bio->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
