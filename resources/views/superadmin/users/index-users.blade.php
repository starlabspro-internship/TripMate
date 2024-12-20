<x-app-layout>
    <div x-data="{ currentTab: 'pending', search: '', filteredUsers() { /* your filtering logic */ } }" class="container mx-auto mt-5 px-4 sm:px-6 lg:px-8 xl:px-10">
        
        <!-- Tab Buttons -->
        <div class="w-full flex justify-center items-center mb-6">
            <div class="flex gap-1 bg-gray-300 px-0 py-0 rounded-full shadow-sm relative mt-5 w-full sm:w-auto sm:mt-5">
                <button @click="currentTab = 'pending'" 
                    :class="currentTab === 'pending' ? 'bg-white text-gray-700 shadow-md' : 'bg-gray-300 text-white'" 
                    class="flex-1 lg:w-64 sm:flex-none w-full sm:w-auto px-2 py-2 sm:px-6 sm:py-2 rounded-full text-sm sm:text-base font-semibold transition-all duration-300 whitespace-nowrap text-center">
                    Pending Verification
                </button>
                <button @click="currentTab = 'rejected'" 
                    :class="currentTab === 'rejected' ? 'bg-white text-gray-700 shadow-md' : 'bg-gray-300 text-white'" 
                    class="flex-1 lg:w-64 sm:flex-none w-full sm:w-auto px-2 py-2 sm:px-6 sm:py-2 rounded-full text-sm sm:text-base font-semibold transition-all duration-300 whitespace-nowrap text-center">
                    Rejected Users
                </button>
            </div>
        </div>    
        
        <!-- Search Bar -->
        <div class="border-t border-gray-300 mx-auto w-full"></div>

        <div class="w-full flex justify-left items-center mb-3 mt-5 ">
            <div class="mx-3">
                <div class="w-full max-w-sm min-w-30 relative">
                    <div class="relative">
                        <input
                            class="bg-white w-full pr-11 h-8 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-full transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                            id="search"
                            name="search"
                            type="search"
                            x-model="search"
                            placeholder="Search"
                        />
                        <button
                            class="absolute h-6 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded overflow-hidden"
                            type="button"
                            @click="filteredUsers()"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6 text-slate-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Verification Table -->
        <div x-show="currentTab === 'pending'" class="relative rounded-lg flex flex-col h-full overflow-y-auto max-h-[calc(80vh-100px)] text-gray-700 bg-white shadow-lg w-full">
            <div class="overflow-x-auto">
                <table class="w-full text-left table-auto border-collapse">
                    <thead class="bg-white text-gray-400">
                        <tr>
                            <th class="p-4 text-sm sm:text-base leading-none text-gray-400 text-left">Name</th>
                            <th class="p-4 text-sm sm:text-base leading-none text-gray-400 text-left">Verification Status</th>
                            <th class="p-4 text-sm sm:text-base leading-none text-gray-400 text-left">Document</th>
                            <th class="p-4 text-sm sm:text-base leading-none text-gray-400 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingUsers->where('id', '!=', auth()->id()) as $user)
                            <tr class="bg-gray-100 hover:bg-gray-200">
                                <td class="p-4 text-sm sm:text-base text-left">{{ $user->name }}</td>
                                <td class="p-4 text-sm sm:text-base text-left">{{ ucfirst($user->verification_status) }}</td>
                                <td class="p-4 text-sm sm:text-base text-left">
                                    @if($user->id_document)
                                        <button onclick="openDocumentModal('{{ asset('storage/' . $user->id_document) }}')" class="btn bg-blue-500 text-white text-sm sm:text-base px-4 py-2 rounded-md shadow hover:bg-blue-700">View Document</button>
                                    @else
                                        <span>No Document</span>
                                    @endif
                                </td>
                                <td class="p-4 text-sm sm:text-base text-left flex space-x-2">
                                    <form action="{{ route('superadmin.users.verify', $user) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="btn bg-green-600 text-white text-sm sm:text-base px-4 py-2 rounded-md shadow hover:bg-green-700">Verify</button>
                                    </form>
        
                                    <form action="{{ route('superadmin.users.reject', $user) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="btn bg-red-700 text-left text-white text-sm sm:text-base px-4 py-2 rounded-md shadow hover:bg-red-800">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        

        <!-- Rejected Users Table -->
<div x-show="currentTab === 'rejected'" class="relative rounded-lg flex flex-col h-full overflow-y-auto max-h-[calc(80vh-100px)] text-gray-700 bg-white shadow-lg w-full">
    <div class="overflow-x-auto">
        <table class="w-full text-left table-auto border-collapse">
            <thead class="bg-white text-gray-400">
                <tr>
                    <th class="p-4 text-sm sm:text-base leading-none text-gray-400 text-left">Name</th>
                    <th class="p-4 text-sm sm:text-base leading-none text-gray-400 text-left">Verification Status</th>
                    <th class="p-4 text-sm sm:text-base leading-none text-gray-400 text-left">Document</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rejectedUsers->where('id', '!=', auth()->id()) as $user)
                    <tr class="bg-gray-100 hover:bg-gray-200">
                        <td class="p-4 text-sm sm:text-base text-left">{{ $user->name }}</td>
                        <td class="p-4 text-sm sm:text-base text-left">{{ ucfirst($user->verification_status) }}</td>
                        <td class="p-4 text-sm sm:text-base text-left">
                            @if($user->id_document)
                                <button onclick="openDocumentModal('{{ asset('storage/' . $user->id_document) }}')" class="btn bg-blue-500 text-white text-sm sm:text-base px-4 py-2 rounded-md hover:bg-blue-700">View Document</button>
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


    </div>

    <!-- Modal for Document Preview -->
    <div id="documentModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
        <div class="bg-white p-4 rounded-lg max-w-lg w-full relative">
            <img id="documentImage" src="" alt="Document Preview" class="w-full h-auto rounded">
            <button onclick="closeDocumentModal()" class="absolute top-4 right-4 text-white bg-red-500 px-4 py-2 rounded">Close</button>
        </div>
    </div>

</x-app-layout>
