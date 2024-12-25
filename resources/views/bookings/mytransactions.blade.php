<x-app-layout>
<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
      <nav>
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
    
        </ol>
      </nav>
    </div>
  </nav>
  <div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <!-- Card Section -->
      <div class="w-full lg:w-1/3 px-3 mb-6 lg:mb-0">
        <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
          <div class="relative overflow-hidden rounded-2xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg')">
            <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 opacity-80"></span>
            <div class="relative z-10 flex-auto p-4">
              <h5 class="pb-2 mt-6 mb-12 text-white">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;4242</h5>
              <div class="flex">
                <div class="mr-6">
                  <p class="mb-0 text-sm leading-normal text-white opacity-80">{{ __('messages.Card Holder') }}</p>
                  <h6 class="mb-0 text-white">{{ auth()->user()->name }} {{ auth()->user()->lastname }}</h6>
                </div>
                <div>
                  <p class="mb-0 text-sm leading-normal text-white opacity-80">{{ __('messages.Expires') }}</p>
                  <h6 class="mb-0 text-white">11/25</h6>
                </div>
              </div>
              <div class="flex items-end justify-end w-1/5 ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 1024 1024">
                  <circle cx="512" cy="512" r="512" style="fill:#635bff"/>
                  <path d="M781.67 515.75c0-38.35-18.58-68.62-54.08-68.62s-57.23 30.26-57.23 68.32c0 45.09 25.47 67.87 62 67.87 17.83 0 31.31-4 41.5-9.74v-30c-10.19 5.09-21.87 8.24-36.7 8.24-14.53 0-27.42-5.09-29.06-22.77h73.26c.01-1.92.31-9.71.31-13.3zm-74-14.23c0-16.93 10.34-24 19.78-24 9.14 0 18.88 7 18.88 24zm-95.14-54.39a42.32 42.32 0 0 0-29.36 11.69l-1.95-9.29h-33v174.68l37.45-7.94.15-42.4c5.39 3.9 13.33 9.44 26.52 9.44 26.82 0 51.24-21.57 51.24-69.06-.12-43.45-24.84-67.12-51.05-67.12zm-9 103.22c-8.84 0-14.08-3.15-17.68-7l-.15-55.58c3.9-4.34 9.29-7.34 17.83-7.34 13.63 0 23.07 15.28 23.07 34.91.01 20.03-9.28 35.01-23.06 35.01zM496.72 438.29l37.6-8.09v-30.41l-37.6 7.94v30.56zm0 11.39h37.6v131.09h-37.6zm-40.3 11.08L454 449.68h-32.34v131.08h37.45v-88.84c8.84-11.54 23.82-9.44 28.46-7.79v-34.45c-4.78-1.8-22.31-5.1-31.15 11.08zm-74.91-43.59L345 425l-.15 120c0 22.17 16.63 38.5 38.8 38.5 12.28 0 21.27-2.25 26.22-4.94v-30.45c-4.79 1.95-28.46 8.84-28.46-13.33v-53.19h28.46v-31.91h-28.51zm-101.27 70.56c0-5.84 4.79-8.09 12.73-8.09a83.56 83.56 0 0 1 37.15 9.59V454a98.8 98.8 0 0 0-37.12-6.87c-30.41 0-50.64 15.88-50.64 42.4 0 41.35 56.93 34.76 56.93 52.58 0 6.89-6 9.14-14.38 9.14-12.43 0-28.32-5.09-40.9-12v35.66a103.85 103.85 0 0 0 40.9 8.54c31.16 0 52.58-15.43 52.58-42.25-.17-44.63-57.25-36.69-57.25-53.47z" style="fill:#fff"/>
               </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Payment Method Section -->
      <div class="w-full lg:w-2/3 px-3">
        <div class="relative flex flex-col min-w-0 mt-0 break-words bg-gray-200 border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <div class="flex flex-wrap -mx-3">
              <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                <h6 class="mb-0 dark:text-white">{{ __('messages.Payment Method') }}</h6>
              </div>
              <div class="flex-none w-1/2 max-w-full px-3 text-right">
                <span class="inline-block px-5 py-2.5 leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25"> 
                  {{ __('messages.Card Information') }}
                </span>
              </div>
            </div>
          </div>
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none ">
                <div class="  relative flex flex-col items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none md-max:overflow-auto rounded-xl border-slate-400 dark:border-slate-300 bg-clip-border">
                  <div class="flex w-full items-center justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 1024 1024" class="mr-16">
                      <circle cx="512" cy="512" r="512" style="fill:#635bff"/>
                      <path d="M781.67 515.75c0-38.35-18.58-68.62-54.08-68.62s-57.23 30.26-57.23 68.32c0 45.09 25.47 67.87 62 67.87 17.83 0 31.31-4 41.5-9.74v-30c-10.19 5.09-21.87 8.24-36.7 8.24-14.53 0-27.42-5.09-29.06-22.77h73.26c.01-1.92.31-9.71.31-13.3zm-74-14.23c0-16.93 10.34-24 19.78-24 9.14 0 18.88 7 18.88 24zm-95.14-54.39a42.32 42.32 0 0 0-29.36 11.69l-1.95-9.29h-33v174.68l37.45-7.94.15-42.4c5.39 3.9 13.33 9.44 26.52 9.44 26.82 0 51.24-21.57 51.24-69.06-.12-43.45-24.84-67.12-51.05-67.12zm-9 103.22c-8.84 0-14.08-3.15-17.68-7l-.15-55.58c3.9-4.34 9.29-7.34 17.83-7.34 13.63 0 23.07 15.28 23.07 34.91.01 20.03-9.28 35.01-23.06 35.01zM496.72 438.29l37.6-8.09v-30.41l-37.6 7.94v30.56zm0 11.39h37.6v131.09h-37.6zm-40.3 11.08L454 449.68h-32.34v131.08h37.45v-88.84c8.84-11.54 23.82-9.44 28.46-7.79v-34.45c-4.78-1.8-22.31-5.1-31.15 11.08zm-74.91-43.59L345 425l-.15 120c0 22.17 16.63 38.5 38.8 38.5 12.28 0 21.27-2.25 26.22-4.94v-30.45c-4.79 1.95-28.46 8.84-28.46-13.33v-53.19h28.46v-31.91h-28.51zm-101.27 70.56c0-5.84 4.79-8.09 12.73-8.09a83.56 83.56 0 0 1 37.15 9.59V454a98.8 98.8 0 0 0-37.12-6.87c-30.41 0-50.64 15.88-50.64 42.4 0 41.35 56.93 34.76 56.93 52.58 0 6.89-6 9.14-14.38 9.14-12.43 0-28.32-5.09-40.9-12v35.66a103.85 103.85 0 0 0 40.9 8.54c31.16 0 52.58-15.43 52.58-42.25-.17-44.63-57.25-36.69-57.25-53.47z" style="fill:#fff"/>
                    </svg>
                    <h6 class="dark:text-white text-center">**** **** **** 5248</h6>
                  </div>
                </div>
              </div>
              <div class="max-w-full px-3 md:w-1/2 md:flex-none ">
                <div class="relative flex flex-col items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none md-max:overflow-auto rounded-xl border-slate-400 dark:border-slate-700 bg-clip-border">
                  <div class="flex w-full items-center justify-start ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 1024 1024" class="mr-16">
                      <circle cx="512" cy="512" r="512" style="fill:#5fa36e"/>
                      <path d="M781.67 515.75c0-38.35-18.58-68.62-54.08-68.62s-57.23 30.26-57.23 68.32c0 45.09 25.47 67.87 62 67.87 17.83 0 31.31-4 41.5-9.74v-30c-10.19 5.09-21.87 8.24-36.7 8.24-14.53 0-27.42-5.09-29.06-22.77h73.26c.01-1.92.31-9.71.31-13.3zm-74-14.23c0-16.93 10.34-24 19.78-24 9.14 0 18.88 7 18.88 24zm-95.14-54.39a42.32 42.32 0 0 0-29.36 11.69l-1.95-9.29h-33v174.68l37.45-7.94.15-42.4c5.39 3.9 13.33 9.44 26.52 9.44 26.82 0 51.24-21.57 51.24-69.06-.12-43.45-24.84-67.12-51.05-67.12zm-9 103.22c-8.84 0-14.08-3.15-17.68-7l-.15-55.58c3.9-4.34 9.29-7.34 17.83-7.34 13.63 0 23.07 15.28 23.07 34.91.01 20.03-9.28 35.01-23.06 35.01zM496.72 438.29l37.6-8.09v-30.41l-37.6 7.94v30.56zm0 11.39h37.6v131.09h-37.6zm-40.3 11.08L454 449.68h-32.34v131.08h37.45v-88.84c8.84-11.54 23.82-9.44 28.46-7.79v-34.45c-4.78-1.8-22.31-5.1-31.15 11.08zm-74.91-43.59L345 425l-.15 120c0 22.17 16.63 38.5 38.8 38.5 12.28 0 21.27-2.25 26.22-4.94v-30.45c-4.79 1.95-28.46 8.84-28.46-13.33v-53.19h28.46v-31.91h-28.51zm-101.27 70.56c0-5.84 4.79-8.09 12.73-8.09a83.56 83.56 0 0 1 37.15 9.59V454a98.8 98.8 0 0 0-37.12-6.87c-30.41 0-50.64 15.88-50.64 42.4 0 41.35 56.93 34.76 56.93 52.58 0 6.89-6 9.14-14.38 9.14-12.43 0-28.32-5.09-40.9-12v35.66a103.85 103.85 0 0 0 40.9 8.54c31.16 0 52.58-15.43 52.58-42.25-.17-44.63-57.25-36.69-57.25-53.47z" style="fill:#fff"/>
                    </svg>
                    <h6 class="dark:text-white text-center">**** **** **** 7348</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

      {{-- filteri funksional --}}
      <div class="flex justify-center items-center mb-4 mt-10"> 
        <form method="GET" action="{{ route('bookings.transactions') }}" class="flex flex-wrap gap-4 items-center justify-center w-full">
            <div class="flex flex-col w-40">
                <label for="date_from" class="block text-sm font-medium text-white">{{ __('messages.From:') }}</label>
                <input type="date" id="filter_date" name="date_from" 
                       value="{{ request('date_from') }}" 
                       placeholder="{{ __('messages.Select Date') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
            </div>
            <div class="flex flex-col w-40">
                <label for="date_to" class="block text-sm font-medium text-white">{{ __('messages.To:') }}</label>
                <input type="date" id="filter_date" name="date_to" 
                       value="{{ request('date_to') }}" 
                       placeholder="{{ __('messages.Select Date') }}"
                       class="mt-1 block w-full  border-gray-300 rounded-md shadow-sm focus:border-orange-400 focus:ring focus:ring-orange-400 focus:ring-opacity-50 text-sm">
            </div>
            <div class="flex flex-col w-40">
                <label for="status" class="block text-sm font-medium text-white ">{{ __('messages.Status') }}:</label>
                <select id="status" name="status" 
                        class="mt-1 block w-full px-1 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm appearance-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                    <option value="">{{ __('messages.All') }}</option>
                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>{{ __('messages.Paid') }} </option>
                    <option value="refunded" {{ request('status') == 'refunded' ? 'selected' : '' }}>{{ __('messages.Refunded') }}</option>
                </select>
            </div>
    

            <div class="w-48 flex flex-col">
                <div class="mb-3 relative">
                    <div class="flex justify-between text-sm font-medium text-white">
                        <span id="min-display">€{{ request('min_amount', 0.00) }}</span>
                        <span id="max-display">€{{ request('max_amount', 10.00) }}</span>
                    </div>
                    <div id="slider-range" class="mt-5"></div>
                </div>
                <input type="hidden" id="min_amount" name="min_amount" value="{{ request('min_amount', 0.00) }}">
                <input type="hidden" id="max_amount" name="max_amount" value="{{ request('max_amount', 10.00) }}">
            </div>
            <div class="flex flex-col">
                <button type="submit" class="px-4 py-2 mt-6 text-sm bg-indigo-500 text-white rounded-md hover:bg-indigo-700">
                  {{ __('messages.Filter') }}
                </button>
            </div>
        </form>
    </div>
    
      <div class="flex flex-wrap justify-between">

        <div class="w-full lg:w-1/2 px-3 mt-10 lg:flex-none overflow-y-auto max-h-[600px] ">
          <div class=" bg-[#c9dde2] relative flex flex-col h-full min-w-0 break-words  border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border overflow-y-auto">
            <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <div class="flex flex-wrap -mx-3">
                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                  <h6 class="mb-0 font-semibold leading-normal dark:text-white text-gray-900">{{ __('messages.Outgoing Transactions') }}</h6>
                </div>
              </div>
            </div>
            <div class="mb-12">
              @if($moneySent->isEmpty())
              <div class="md:text-left ml-4 text-gray-600">{{ __('messages.No records of payments made by you.') }}</div>
          @else
              <div class="flex-auto p-4 pb-0">
                  <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                      @foreach($moneySent as $transaction)
                          @if($transaction->status === 'paid' || $transaction->status === 'refunded') 
                                <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                                 
                                  <div class="flex flex-col w-1/2">
                                      <h6 class="mb-1 text-sm font-semibold leading-normal dark:text-white text-slate-700">
                                          {{ $transaction->created_at ? $transaction->created_at->format('M, d, Y') : 'N/A' }}
                                          {{ $transaction->created_at ? $transaction->created_at->format('H:i') : 'N/A' }}
                                      </h6>
                                      <span class="mb-0.5 text-xs leading-tight text-gray-700 dark:text-white dark:opacity-80">
                                          ID: #{{ $transaction->id }}
                                      </span>
                                      <span class="mb-0.5 text-xs leading-tight text-gray-700 dark:text-white dark:opacity-80">
                                          Trip: {{ $transaction->trip->origincity->name }} to {{ $transaction->trip->destinationcity->name }} 
                                      </span>
                                      <span class="mb-0.5 text-xs text-gray-700 dark:text-white/80">
                                        Trip Date: {{ $transaction->trip->departure_time->format('H:i d, M') }} - {{ $transaction->trip->arrival_time->format('H:i d, M') }}
                                      </span>
                                      <span class="mb-0.5 text-xs leading-tight text-gray-700 dark:text-white dark:opacity-80">
                                          Driver: {{ $transaction->trip->users->name }} {{ $transaction->trip->users->lastname }}
                                      </span>
                                  </div>
                                  
                                  <div class="flex flex-col w-1/4 items-end text-sm leading-normal dark:text-white/80">
                                
                                      <span class="block font-bold text-lg
                                          {{ $transaction->status === 'paid' ? 'text-red-500' : 'text-green-500' }}">
                                          {{ $transaction->status === 'paid' ? '-' : '+' }}{{ $transaction->total_price }}€
                                      </span>
                                      <span class="block text-xs font-medium
                                          {{ $transaction->status === 'paid' ? 'text-red-600' : 'text-green-600' }}">
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
          </div>
        </div>

      
        <div class="w-full lg:w-1/2 px-3 mt-10 lg:flex-none overflow-y-auto max-h-[800px]">
          <div class="bg-[#c9dde2] relative flex flex-col h-full min-w-0 break-words  border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border overflow-y-auto">
            <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <div class="flex flex-wrap -mx-3">
                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                  <h6 class="mb-0 font-semibold leading-normal dark:text-white text-gray-800">{{ __('messages.Incoming Transactions') }}</h6>
                </div>
              </div>
            </div>
            <div class="mb-12">
              @if($moneyReceived->isEmpty())
                <div class="md:text-left ml-4 text-gray-600">No records of payments received by you.</div>
              @else
                <div class="flex-auto p-4 pb-0">
                  <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    @foreach($moneyReceived as $transaction)
                    @if($transaction->status === 'paid' || $transaction->status === 'refunded') 
                      <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                        <div class="flex flex-col">
                          <h6 class="mb-1 text-sm font-semibold leading-normal dark:text-white text-slate-700">
                            {{ $transaction->created_at ? $transaction->created_at->format('M, d, Y') : 'N/A' }}
                            {{ $transaction->created_at ? $transaction->created_at->format('H:i') : 'N/A' }}
                          </h6>
                          <span class="mb-0.5 text-xs leading-tight text-gray-700 dark:text-white dark:opacity-80">
                            ID: #{{ $transaction->id }}
                          </span>
                          <span class="mb-0.5 text-xs leading-tight text-gray-700 dark:text-white dark:opacity-80">
                            Trip: {{ $transaction->trip->origincity->name }} to {{ $transaction->trip->destinationcity->name }} 
                          </span>
                          <span class="mb-0.5 text-xs text-gray-700 dark:text-white/80">
                            Trip Date: {{ $transaction->trip->departure_time->format('H:i d, M') }} - {{ $transaction->trip->arrival_time->format('H:i d, M') }}
                          </span>
                          <span class="mb-0.5 text-xs leading-tight text-gray-700 dark:text-white dark:opacity-80">
                            Passenger: {{ $transaction->passenger ? $transaction->passenger->name : 'N/A' }} 
                            {{ $transaction->passenger ? $transaction->passenger->lastname : '' }}
                          </span>
                        </div>
                       
                        <div class="flex flex-col w-1/4 items-end text-sm leading-normal dark:text-white/80">
                          <span class="block font-bold text-lg 
                          
                              {{ $transaction->status === 'paid' ? 'text-green-500' : 'text-red-500' }}">
                              {{ $transaction->status === 'paid' ? '+' : '-' }}{{ $transaction->total_price }}€
                          </span>
                          <span class="block text-xs font-medium 
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
          </div>
        </div>
      </div>
    </div>
</main>
</x-app-layout>
<script>
  $(function () {
      // Initialize jQuery UI Slider
      $("#slider-range").slider({
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
              $("#min-display").text(`€${ui.values[0].toFixed(2)}`);
              $("#max-display").text(`€${ui.values[1].toFixed(2)}`);
              // Update Hidden Inputs
              $("#min_amount").val(ui.values[0]);
              $("#max_amount").val(ui.values[1]);
          }
      });

      // Set Initial Display Values
      $("#min-display").text(`€${$("#slider-range").slider("values", 0).toFixed(2)}`);
      $("#max-display").text(`€${$("#slider-range").slider("values", 1).toFixed(2)}`);

      // Apply custom styles
      $("#slider-range .ui-slider-range").css("background-color", "#366BFA");
      $("#slider-range .ui-slider-handle").css({
          "background-color": "#B7DCFF",
          "border": "1px solid #7E97DE",
      });
      $("#slider-range").css("background-color", "#ffffff");
  });
</script>