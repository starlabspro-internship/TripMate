<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-8 py-3 bg-indigo-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wide hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 focus:ring-offset-2 transition ease-in-out duration-200 shadow-md hover:shadow-lg']) }}>
    {{ $slot }}
</button>
