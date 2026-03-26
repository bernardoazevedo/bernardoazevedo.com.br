<div id="search-container" style="display: inline-block; vertical-align: middle;">
    <div style="position: relative; display: inline-block;">
        <input
            id="search-input"
            type="text"
            placeholder="Search..."
            style="padding-right: 2rem; width: 180px;"
        />
        <button
            type="button" disabled
            style="position: absolute; right: 4px; top: 50%; transform: translateY(-50%); border: none; background: transparent; cursor: pointer; padding: 0;"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="14" height="14">
            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div id="search-results" class="hidden" style="position: absolute; background: var(--background-color); border: 1px solid var(--font-color); z-index: 10; width: 180px;">
    </div>
</div>
