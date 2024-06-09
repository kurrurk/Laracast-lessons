<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<a href="/"             class="<?= urlIs ('/') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white '; ?>block rounded-md px-3 py-2 text-base font-medium">Startseite</a>
<a href="/about"    class="<?= urlIs ('/about') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white '; ?>block rounded-md px-3 py-2 text-base font-medium">Über uns</a>
<a href="/contact"  class="<?= urlIs ('/contact') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white '; ?>block rounded-md px-3 py-2 text-base font-medium">Kontakt</a>
<a href="/notes"  class="<?= urlIs ('/notes') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white '; ?>block rounded-md px-3 py-2 text-base font-medium">Notizen</a>
<a href="/mission"  class="<?= urlIs ('/mission') ? 'bg-gray-900 text-white ' : 'text-gray-300 hover:bg-gray-700 hover:text-white '; ?>block rounded-md px-3 py-2 text-base font-medium">Unsere Mission</a>
