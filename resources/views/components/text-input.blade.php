@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-stone-200 focus:border-agro-500 focus:ring-agro-500 rounded-xl shadow-sm bg-stone-50 text-stone-800 transition-colors duration-200 py-2.5 px-4 w-full']) }}>
