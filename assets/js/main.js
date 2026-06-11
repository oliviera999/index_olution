/**
* Template Name: Laura - v4.8.1
* Template URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Tous les liens externes (hors même origine) s'ouvrent dans un nouvel onglet
   */
  const applyExternalLinkTarget = () => {
    const origin = window.location.origin;
    document.querySelectorAll('a[href^="http://"], a[href^="https://"]').forEach(function(a) {
      try {
        if (new URL(a.href, window.location.origin).origin === origin) return;
      } catch (e) { return; }
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
   * Handler scroll unifié (RAF) : progress bar, nav active, header, back-to-top
   */
  const progressBar = document.getElementById('scroll-progress');
  const navbarlinks = select('#navbar .scrollto', true);
  const selectHeader = select('#header');
  const backtotop = select('.back-to-top');
  let ticking = false;

  const onScroll = () => {
    if (!ticking) {
      requestAnimationFrame(() => {
        const scrollY = window.scrollY || document.documentElement.scrollTop;
        if (progressBar) {
          const docHeight = document.documentElement.scrollHeight - window.innerHeight;
          progressBar.style.width = (docHeight > 0 ? (scrollY / docHeight) * 100 : 0) + '%';
        }
        const position = scrollY + 200;
        navbarlinks.forEach(function(navbarlink) {
          if (!navbarlink.hash) return;
          const section = select(navbarlink.hash);
          if (!section) return;
          const isActive = position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight);
          navbarlink.classList.toggle('active', isActive);
        });
        if (selectHeader) {
          selectHeader.classList.toggle('header-scrolled', scrollY > 100);
        }
        if (backtotop) {
          backtotop.classList.toggle('active', scrollY > 100);
        }
        ticking = false;
      });
      ticking = true;
    }
  };
  window.addEventListener('load', onScroll);
  window.addEventListener('scroll', onScroll, { passive: true });

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    const header = select('#header');
    let offset = header ? header.offsetHeight : 0;
    if (header && !header.classList.contains('header-scrolled')) {
      offset -= 20;
    }
    const target = select(el);
    if (target) {
      window.scrollTo({
        top: target.offsetTop - offset,
        behavior: 'smooth'
      });
    }
  }

  /**
   * Mobile nav toggle (synchronise aria-expanded pour les lecteurs d'écran)
   */
  on('click', '.mobile-nav-toggle', function(e) {
    const navbar = select('#navbar')
    navbar.classList.toggle('navbar-mobile')
    this.setAttribute('aria-expanded', navbar.classList.contains('navbar-mobile') ? 'true' : 'false')
    const icon = this.querySelector('i') || this
    icon.classList.toggle('bi-list')
    icon.classList.toggle('bi-x')
  })

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
        navbarToggle.setAttribute('aria-expanded', 'false')
        // l'icône est dans le <i> du bouton, pas sur le bouton lui-même
        const icon = navbarToggle.querySelector('i') || navbarToggle
        icon.classList.toggle('bi-list')
        icon.classList.toggle('bi-x')
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
   * Skills animation (IntersectionObserver, comme les sliders — sans Waypoints)
   */
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    const skillsObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          select('.progress .progress-bar', true).forEach((el) => {
            el.style.width = el.getAttribute('aria-valuenow') + '%'
          });
          skillsObserver.disconnect();
        }
      });
    }, { threshold: 0.2 });
    skillsObserver.observe(skilsContent);
  }

  /**
   * Testimonials slider — autoplay ne démarre que lorsque le slider est totalement affiché
   */
  const testimonialsSlider = document.querySelector('.testimonials-slider');
  if (testimonialsSlider) {
    const testimonialsSwiper = new Swiper('.testimonials-slider', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 10000,
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

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          testimonialsSwiper.autoplay.start();
          observer.disconnect();
        }
      });
    }, { threshold: 1 });
    observer.observe(testimonialsSlider);
  }
  
  /**
   * Actions slider — autoplay uniquement quand visible (IntersectionObserver)
   */
  const actionsSliderEl = document.querySelector('.actions-slider');
  if (actionsSliderEl) {
    const actionsSwiper = new Swiper('.actions-slider', {
      speed: 600,
      loop: true,
      autoplay: { delay: 5000, disableOnInteraction: false },
      slidesPerView: 'auto',
      pagination: { el: '.actions-slider .swiper-pagination', type: 'bullets', clickable: true }
    });
    actionsSwiper.autoplay.stop();
    const actionsObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          actionsSwiper.autoplay.start();
          actionsObserver.disconnect();
        }
      });
    }, { threshold: 0.5 });
    actionsObserver.observe(actionsSliderEl);
  }

  /**
   * Initiate portfolio lightbox (après Isotope pour DOM stable — focus déplacé à l'ouverture)
   */
  function initPortfolioLightbox() {
    if (typeof GLightbox === 'undefined') return;
    GLightbox({
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
  }

  /**
   * Recalcul AOS + grille portfolio quand le layout change (images lazy, fonts, etc.)
   */
  let portfolioIsotopeInstance = null;
  let layoutRefreshTimer = null;
  const scheduleLayoutAndAosRefresh = () => {
    clearTimeout(layoutRefreshTimer);
    layoutRefreshTimer = setTimeout(function () {
      if (typeof AOS !== 'undefined') {
        AOS.refresh();
      }
      if (portfolioIsotopeInstance) {
        portfolioIsotopeInstance.layout();
      }
    }, 120);
  };

  /**
   * Portfolio isotope and filter — "En bref" : tirage aléatoire de quelques items à chaque chargement.
   * Exécution dès que le JS tourne (defer en fin de body), pas sur window.load : évite de bloquer
   * toute l’init sur le chargement de toutes les images / ressources lentes.
   */
  const initPortfolio = () => {
    const portfolioContainer = select('.portfolio-container');
    if (!portfolioContainer) return;

    const items = portfolioContainer.querySelectorAll('.portfolio-item');
    if (!items.length) return;

    let count = parseInt(portfolioContainer.getAttribute('data-en-bref-count'), 10) || 8;
    count = Math.min(count, items.length);
    // Les items curatés (classe .featured, flag 'bref' dans data/portfolio.php) passent
    // en priorité dans "En bref" ; le reste du quota est tiré au hasard.
    let selected = 0;
    items.forEach(function(item) {
      if (selected < count && item.classList.contains('featured')) {
        item.classList.add('in-bref');
        selected++;
      }
    });
    const order = Array.from({ length: items.length }, (_, i) => i);
    for (let i = order.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [order[i], order[j]] = [order[j], order[i]];
    }
    for (let k = 0; k < order.length && selected < count; k++) {
      const item = items[order[k]];
      if (!item.classList.contains('in-bref')) {
        item.classList.add('in-bref');
        selected++;
      }
    }

    try {
      if (typeof Isotope === 'undefined') {
        throw new Error('Isotope indisponible');
      }
      portfolioIsotopeInstance = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item',
        filter: '.in-bref',
        layoutMode: 'fitRows',
        percentPosition: true,
        transitionDuration: '0.4s'
      });

      const portfolioFilters = select('#portfolio-flters li', true);
      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');
        portfolioIsotopeInstance.arrange({
          filter: this.getAttribute('data-filter')
        });
      }, true);

      if (window.ResizeObserver) {
        new ResizeObserver(scheduleLayoutAndAosRefresh).observe(portfolioContainer);
      }
    } catch (err) {
      console.error(err);
    }

    initPortfolioLightbox();
  };

  initPortfolio();

  window.addEventListener('load', scheduleLayoutAndAosRefresh);

  /**
   * Initiate Pure Counter au scroll (section #about) — IntersectionObserver
   */
  let aboutSection = select('#about');
  if (aboutSection && typeof PureCounter === 'function') {
    const countersObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          new PureCounter();
          countersObserver.disconnect();
        }
      });
    }, { threshold: 0.2 });
    countersObserver.observe(aboutSection);
  }

})()