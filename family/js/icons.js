const PATHS = {
  home: '<path d="M4 11.2 12 4.5l8 6.7"/><path d="M7 10.8V19.5h10V10.8"/>',
  calendar: '<rect x="4" y="5.5" width="16" height="14.5" rx="2"/><path d="M8 3.8v4M16 3.8v4M4 10.5h16"/>',
  chat: '<path d="M5 6.5h14a1 1 0 0 1 1 1V15a1 1 0 0 1-1 1H9.2L5 19.2V7.5a1 1 0 0 1 1-1z"/>',
  trash: '<path d="M5 7.5h14"/><path d="M9.2 7.5V5.8h5.6V7.5"/><path d="M7.6 7.5l.7 11.2h7.4l.7-11.2"/><path d="M10.2 11v4.8M13.8 11v4.8"/>',
  hospital: '<circle cx="12" cy="12" r="7.5"/><path d="M12 8.5v7M8.5 12h7"/>',
  shopping: '<path d="M6.5 8.5h11l-.9 10.2H7.4L6.5 8.5z"/><path d="M9 8.5V7a3 3 0 0 1 6 0v1.5"/>',
  payment: '<rect x="3.8" y="6" width="16.4" height="12" rx="2"/><path d="M3.8 10h16.4M7.5 14.2h4"/>',
  other: '<circle cx="12" cy="12" r="7.5"/><path d="M12 11v5"/><path d="M12 8.2h.01"/>',
  back: '<path d="M14.5 5.5 8 12l6.5 6.5"/>',
  chevron: '<path d="M9 6.5 15 12l-6 5.5"/>',
  leaf: '<path d="M5.5 14.5C11 13.5 14 8.5 19 5c-.8 8.2-5.2 13-12.2 14-1.3.2-2.6-1.1-2.3-2.4"/><path d="M9.2 14.2c.8-2.2 2.4-4.2 5-6.2"/>',
};

export function icon(name) {
  const body = PATHS[name] || PATHS.other;
  return `<svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">${body}</svg>`;
}
