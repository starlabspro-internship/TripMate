<x-app-layout>
    <div class="container mx-auto mt-28 px-4 ">
        <h2 class="text-2xl font-bold mb-4 text-center">Pending Verification</h2>

        @if(session('success'))
            <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Pending Verification Table -->
        <div class="overflow-x-auto">
            <table class="w-1/2 bg-green-100 shadow-md rounded-lg overflow-hidden mb-6 mx-auto">
                <thead class="bg-emerald-900 text-white">
                    <tr>
                        <th class="text-sm py-4"> Name</th>
                        <th class="text-sm py-4">Verification Status</th>
                        <th class="text-sm py-4">Document</th>
                        <th class="text-sm py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingUsers as $user)
                        <tr>
                            <td class="p-4 text-center">{{ $user->name }}</td>
                            <td class="p-4 text-center">{{ ucfirst($user->verification_status) }}</td>
                            <td class="p-4 text-center">
                                @if($user->id_document)
                                    <button onclick="openDocumentModal('{{ asset('storage/' . $user->id_document) }}')" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View Document</button>
                                @else
                                    <span>No Document</span>
                                @endif
                            </td>
                            <td class="p-4 text-center flex justify-center space-x-2">
                                <form action="{{ route('superadmin.users.verify', $user) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="btn bg-green-900 text-white px-4 py-2 rounded hover:bg-green-700">Verify</button>
                                </form>
                                
                                <form action="{{ route('superadmin.users.reject', $user) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="btn bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Rejected Users Table -->
        <h2 class="text-2xl font-bold mb-4 text-center">Rejected Users</h2>
        <div class="overflow-x-auto">
            <table class="w-1/2 bg-red-100 shadow-md rounded-lg overflow-hidden mb-6 mx-auto">
                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="p-4 text-sm font-semibold"> Name</th>
                        <th class="p-4 text-sm font-semibold">Verification Status</th>
                        <th class="p-4 text-sm font-semibold">Document</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rejectedUsers as $user)
                        <tr>
                            <td class="p-4 text-center">{{ $user->name }}</td>
                            <td class="p-4 text-center">{{ ucfirst($user->verification_status) }}</td>
                            <td class="p-4 text-center">
                                @if($user->id_document)
                                    <button onclick="openDocumentModal('{{ asset('storage/' . $user->id_document) }}')" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View Document</button>
                                @else
                                    <span>No Document</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Document Preview -->
    <div id="documentModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
        <div class="bg-white p-4 rounded-lg max-w-lg w-full relative">
            <img id="documentImage" src="" alt="Document Preview" class="w-full h-auto rounded">
            <button onclick="closeDocumentModal()" class="absolute top-4 right-4 text-white bg-red-500 px-4 py-2 rounded">Close</button>
        </div>
    </div>

  
</x-app-layout>
