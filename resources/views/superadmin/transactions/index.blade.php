<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="flex justify-center text-4xl font-bold mb-6 text-white">{{ __('messages.All Transactions') }}</h1>

        <div class="flex justify-center items-center mb-4 mt-10">

            <form method="GET" action="{{ route('superadmin.transactions') }}" class="flex flex-wrap gap-4 items-center justify-center w-full space-x-4">
            <div class="flex flex-col">
                <label for="date_from" class="block text-sm font-medium text-white">{{ __('messages.From:') }}</label>
                <input type="date" id="filter_date" name="date_from" 
                       value="{{ request('date_from') }}" 
                       placeholder="{{ __('messages.Select Date') }}"
                       class="mt-1 block w-32 sm:w-40 border-gray-300 bg-customgreen-100 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
            </div>
            <div class="flex flex-col">
                <label for="date_to" class="block text-sm font-medium text-white">{{ __('messages.To:') }}</label>
                <input type="date" id="filter_date" name="date_to" 
                       value="{{ request('date_to') }}" 
                       placeholder="{{ __('messages.Select Date') }}"
                       class="mt-1 block w-32 sm:w-40 border-gray-300 bg-customgreen-100 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
            </div>
                <div class="flex flex-col">
                    <label for="status" class="block text-sm font-medium text-white">{{ __('messages.Status') }}:</label>
                    <select name="status" 
                        class="mt-1 block w-32 sm:w-40 px-1 py-2 text-sm text-gray-700  border bg-customgreen-100 border-gray-300 rounded-md shadow-sm appearance-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        <option value="">{{ __('messages.All') }}</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>{{ __('messages.Paid') }}</option>
                        <option value="refunded" {{ request('status') == 'refunded' ? 'selected' : '' }}>{{ __('messages.Refunded') }}</option>
                    </select>
                </div>

                <div class="w-48 flex flex-col">
                    <div class="mb-3 relative">

                        <div class="flex justify-between text-sm font-medium text-white">
                            <span id="min-display-superadmin">€{{ request('min_amount', 0.00) }}</span>
                            <span id="max-display-superadmin">€{{ request('max_amount', 10.00) }}</span>
                        </div>
                        <div id="slider-range-superadmin" class="mt-5"></div>
                    </div>

                    <input type="hidden" id="min_amount_superadmin" name="min_amount" value="{{ request('min_amount', 0.00) }}">
                    <input type="hidden" id="max_amount_superadmin" name="max_amount" value="{{ request('max_amount', 10.00) }}">
                </div>

                <div class="flex flex-col">
                    <button type="submit" class="px-4 py-2 mt-6 text-sm bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        {{ __('messages.Filter') }}
                    </button>
                </div>
            </form>
        </div>

        @if($transactions->isEmpty())
            <div class="text-center text-gray-600">{{ __('messages.No transactions available.') }}</div>
        @else
            <div class="flex-auto p-4 pb-0 overflow-y-auto max-h-[600px] w-full max-w-[900px] mx-auto">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    @foreach($transactions as $transaction)
                        @if($transaction->status === 'paid' || $transaction->status === 'refunded') 
                            <li class="relative flex flex-wrap justify-between items-center p-4 mb-2 border-0 rounded-xl bg-white shadow-md dark:bg-gray-800">
                                <div class="flex flex-col w-full md:w-2/3 mb-4 md:mb-0">
                                    <h6 class="mb-1 text-sm font-semibold text-gray-700 dark:text-white">
                                        {{ $transaction->created_at->format('M d, Y') }} at {{ $transaction->created_at->format('H:i') }}
                                    </h6>
                                    <span class="mb-0.5 text-xs text-gray-600 dark:text-white/80">
                                        Transaction ID: #{{ $transaction->id }}
                                    </span>
                                    <span class="mb-0.5 text-xs text-gray-600 dark:text-white/80">
                                        Trip: From {{ $transaction->trip->origincity->name }} to {{ $transaction->trip->destinationcity->name }}
                                    </span>
                                    <span class="mb-0.5 text-xs text-gray-600 dark:text-white/80">
                                        Trip Date: {{ $transaction->trip->departure_time->format('H:i d, M') }} - {{ $transaction->trip->arrival_time->format('H:i d, M') }}
                                    </span>
                                    <span class="mb-0.5 text-xs text-gray-600 dark:text-white/80">
                                        Driver: {{ $transaction->trip->users->name }} {{ $transaction->trip->users->lastname }}
                                    </span>
                                    <span class="mb-0.5 text-xs text-gray-600 dark:text-white/80">
                                        Passenger: {{ $transaction->passenger->name }} {{ $transaction->passenger->lastname }}
                                    </span>
                                    <span class="mb-0.5 text-xs text-gray-600 dark:text-white/80">
                                        Seats Booked: {{ $transaction->seats_booked }}
                                    </span>
                                </div>
                                <div class="w-full md:w-1/3 text-center md:text-right">
                                    <span class="block font-bold text-lg mr-6   
                                        {{ $transaction->status === 'paid' ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $transaction->status === 'paid' ? '+' : '-' }}{{ $transaction->total_price }}€
                                    </span>
                                    <span class="block text-xs font-medium mr-6
                                        {{ $transaction->status === 'paid' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>
<script>
    $(function () {
        // Initialize jQuery UI Slider for Superadmin Transactions
        $("#slider-range-superadmin").slider({
            range: true,
            min: 0,
            max: 10,
            step: 0.50,
            values: [
                {{ request('min_amount', 0.00) }},
                {{ request('max_amount', 10.00) }}
            ],
            slide: function (event, ui) {
                // Update Min and Max Display
                $("#min-display-superadmin").text(`€${ui.values[0].toFixed(2)}`);
                $("#max-display-superadmin").text(`€${ui.values[1].toFixed(2)}`);
                // Update Hidden Inputs
                $("#min_amount_superadmin").val(ui.values[0]);
                $("#max_amount_superadmin").val(ui.values[1]);
            }
        });

        // Set Initial Display Values for Superadmin Transactions
        $("#min-display-superadmin").text(`€${$("#slider-range-superadmin").slider("values", 0).toFixed(2)}`);
        $("#max-display-superadmin").text(`€${$("#slider-range-superadmin").slider("values", 1).toFixed(2)}`);

        // Apply custom styles
        $("#slider-range-superadmin .ui-slider-range").css("background-color", "#366BFA");
        $("#slider-range-superadmin .ui-slider-handle").css({
            "background-color": "#B7DCFF",
            "border": "1px solid #7E97DE",
        });
        $("#slider-range-superadmin").css("background-color", "#ffffff");
    });
</script>
