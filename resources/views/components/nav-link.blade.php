<a href="/" class="{{ request()->is('/') ? 'bg-gray-300 text-gray-800':'text-gray-600 hover:bg-gray-200 hover:text-gray-800' }} block rounded-md px-3 py-2 text-base font-medium" aria-current="{{ request()->is('/') ? 'page':'false'  }}">{{ $slot }}</a>
