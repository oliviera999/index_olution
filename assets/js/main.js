/**
* Template Name: Laura - v4.8.1
* Template URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Tous les liens externes s'ouvrent dans un nouvel onglet
   */
  const applyExternalLinkTarget = () => {
    document.querySelectorAll('a[href^="http://"], a[href^="https://"]').forEach(function(a) {
      if (!a.hasAttribute('target') || a.getAttribute('target') !== '_blank') {
        a.setAttribute('target', '_blank');
        a.setAttribute('rel', 'noopener noreferrer');
      }
    });
  };
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', applyExternalLinkTarget);
  } else {
    applyExternalLinkTarget();
  }

  /**
   * AOS (Animate On Scroll) : init (activé aussi sur mobile)
   */
  const initAOS = () => {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 600,
        easing: 'ease-out-cubic',
        offset: 80,
        once: true,
        disable: false
      });
    }
  };
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAOS);
  } else {
    initAOS();
  }

  /**
   * Barre de progression de scroll
   */
  const updateScrollProgress = () => {
    const progressBar = document.getElementById('scroll-progress');
    if (progressBar) {
      const scrollTop = window.scrollY || document.documentElement.scrollTop;
      const docHeight = document.documentElement.scrollHeight - window.innerHeight;
      const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
      progressBar.style.width = progress + '%';
    }
  };
  window.addEventListener('load', updateScrollProgress);
  window.addEventListener('scroll', updateScrollProgress, { passive: true });

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 20
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    const icon = this.querySelector('i') || this
    icon.classList.toggle('bi-list')
    icon.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url.
   * #about en barre d’adresse au rechargement est annulé : on affiche la page en haut.
   */
  window.addEventListener('load', () => {
    const hash = window.location.hash
    if (hash === '#about') {
      history.replaceState(null, '', window.location.pathname + window.location.search)
      window.scrollTo(0, 0)
      return
    }
    if (hash && select(hash)) {
      scrollto(hash)
    }
  })

  /**
   * Skills animation
   */
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    new Waypoint({
      element: skilsContent,
      offset: '80%',
      handler: function(direction) {
        let progress = select('.progress .progress-bar', true);
        progress.forEach((el) => {
          el.style.width = el.getAttribute('aria-valuenow') + '%'
        });
      }
    })
  }

  /**
   * Testimonials slider — autoplay ne démarre que lorsque la section est visible
   */
  const testimonialsSlider = document.querySelector('.testimonials-slider');
  if (testimonialsSlider) {
    const testimonialsSwiper = new Swiper('.testimonials-slider', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      }
    });
    testimonialsSwiper.autoplay.stop();

    const testimonialsSection = document.querySelector('#testimonials');
    if (testimonialsSection) {
      const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            testimonialsSwiper.autoplay.start();
            observer.disconnect();
          }
        });
      }, { threshold: 0.2 });
      observer.observe(testimonialsSection);
    }
  }
  
    /**
   * Actions slider
   */
  new Swiper('.actions-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Portfolio isotope and filter — "En bref" : tirage aléatoire de quelques items à chaque chargement
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let items = portfolioContainer.querySelectorAll('.portfolio-item');
      let count = parseInt(portfolioContainer.getAttribute('data-en-bref-count'), 10) || 8;
      count = Math.min(count, items.length);
      let order = Array.from({ length: items.length }, (_, i) => i);
      for (let i = order.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        [order[i], order[j]] = [order[j], order[i]];
      }
      for (let k = 0; k < count; k++) {
        items[order[k]].classList.add('in-bref');
      }

      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item',
        filter: '.in-bref',
        transitionDuration: '0.4s'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });

      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox (focus déplacé à l'ouverture pour éviter aria-hidden)
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfolio-lightbox',
    openEffect: 'zoom',
    closeEffect: 'zoom',
    onOpen: function () {
      setTimeout(function () {
        var lb = document.querySelector('.glightbox-container');
        if (lb) {
          lb.setAttribute('tabindex', '-1');
          lb.focus();
        }
      }, 50);
    }
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Initiate Pure Counter au scroll (section #about)
   */
  let aboutSection = select('#about');
  if (aboutSection && typeof PureCounter === 'function') {
    new Waypoint({
      element: aboutSection,
      offset: '80%',
      handler: function() {
        new PureCounter();
        this.destroy();
      }
    });
  }

})()