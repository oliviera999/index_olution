/**
 * Script de validation formulaire (compatibilité template).
 * Le formulaire contact peut être géré côté serveur (forms/contact.php).
 */
(function () {
  'use strict';
  const forms = document.querySelectorAll('.php-email-form');
  forms.forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
