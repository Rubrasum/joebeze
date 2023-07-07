import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

require('./quill.js');

window.Quill = require('Quill');
