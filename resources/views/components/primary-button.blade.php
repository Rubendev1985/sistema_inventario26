<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-agro-700 border border-transparent rounded-xl font-bold text-sm text-white tracking-wide hover:bg-agro-800 focus:bg-agro-800 active:bg-agro-900 shadow-md shadow-agro-700/30 hover:shadow-lg hover:shadow-agro-700/40 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-agro-500 focus:ring-offset-2 transition-all duration-300 w-full sm:w-auto']) }}>
    {{ $slot }}
</button>
