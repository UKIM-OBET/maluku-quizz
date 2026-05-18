/**
 * Student Engagement Animations
 * Maluku Quizz Interactive Effects
 */

// ============================================
// CONFETTI CELEBRATION EFFECT
// ============================================

function triggerConfetti() {
    const colors = ['#FF6B35', '#0B6B63', '#2F9E96', '#EBF5F0', '#124A43'];
    const confettiPieces = 30;

    for (let i = 0; i < confettiPieces; i++) {
        createConfettiPiece(colors[Math.floor(Math.random() * colors.length)]);
    }
}

function createConfettiPiece(color) {
    const confetti = document.createElement('div');
    confetti.classList.add('confetti', 'confetti-piece');
    
    const startX = Math.random() * window.innerWidth;
    const startY = -10;
    const endX = startX + (Math.random() - 0.5) * 300;
    const endY = window.innerHeight + 10;
    
    confetti.style.left = startX + 'px';
    confetti.style.top = startY + 'px';
    confetti.style.width = '8px';
    confetti.style.height = '8px';
    confetti.style.backgroundColor = color;
    confetti.style.borderRadius = '50%';
    confetti.style.setProperty('--tx', (endX - startX) + 'px');
    confetti.style.setProperty('--ty', (endY - startY) + 'px');
    
    document.body.appendChild(confetti);
    
    // Remove after animation completes
    setTimeout(() => confetti.remove(), 2000);
}

// ============================================
// RIPPLE EFFECT ON CLICK
// ============================================

function addRippleEffect(element) {
    if (!element) return;
    
    element.addEventListener('click', function(e) {
        const ripple = document.createElement('div');
        ripple.classList.add('ripple', 'active');
        
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        
        this.appendChild(ripple);
        
        setTimeout(() => ripple.remove(), 600);
    });
}

// ============================================
// ANIMATED COUNTER
// ============================================

function animateCounter(element, targetValue, duration = 1000) {
    if (!element) return;
    
    const currentValue = parseInt(element.textContent) || 0;
    const increment = (targetValue - currentValue) / (duration / 16);
    let currentCount = currentValue;
    
    const timer = setInterval(() => {
        currentCount += increment;
        
        if (increment > 0 && currentCount >= targetValue) {
            element.textContent = targetValue;
            clearInterval(timer);
            element.classList.add('increment');
            setTimeout(() => element.classList.remove('increment'), 600);
        } else if (increment < 0 && currentCount <= targetValue) {
            element.textContent = targetValue;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(currentCount);
        }
    }, 16);
}

// ============================================
// PROGRESS BAR ANIMATION
// ============================================

function animateProgressBar(element, percentage, duration = 1000) {
    if (!element) return;
    
    const progressFill = element.querySelector('.progress-fill');
    if (!progressFill) return;
    
    const steps = 60;
    const stepDuration = duration / steps;
    const startPercent = parseFloat(progressFill.style.width) || 0;
    const percentChange = (percentage - startPercent) / steps;
    
    let currentStep = 0;
    
    const timer = setInterval(() => {
        currentStep++;
        const newPercent = startPercent + (percentChange * currentStep);
        progressFill.style.width = newPercent + '%';
        
        if (currentStep >= steps) {
            progressFill.style.width = percentage + '%';
            clearInterval(timer);
        }
    }, stepDuration);
}

// ============================================
// QUIZ OPTION SELECTION
// ============================================

function setupQuizOptions() {
    const quizOptions = document.querySelectorAll('.quiz-option');
    
    quizOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove selected class from all options
            quizOptions.forEach(opt => opt.classList.remove('selected'));
            
            // Add selected class to clicked option
            this.classList.add('selected');
            
            // Small bounce animation
            this.style.animation = 'none';
            setTimeout(() => {
                this.style.animation = '';
            }, 10);
        });
    });
}

// ============================================
// BADGE PULSE ON ACHIEVEMENT
// ============================================

function celebrateAchievement(badgeElement) {
    if (!badgeElement) return;
    
    // Trigger confetti
    triggerConfetti();
    
    // Add pulse animation
    badgeElement.style.animation = 'none';
    setTimeout(() => {
        badgeElement.style.animation = 'heartbeat 0.8s ease';
    }, 10);
    
    // Show success message
    showNotification('🎉 Achievement Unlocked!', 'success');
}

// ============================================
// NOTIFICATIONS
// ============================================

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.classList.add(`notification-${type}`);
    notification.textContent = message;
    notification.style.position = 'fixed';
    notification.style.top = '20px';
    notification.style.right = '20px';
    notification.style.zIndex = '9999';
    notification.style.minWidth = '300px';
    
    document.body.appendChild(notification);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'fade-in 0.3s ease reverse';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// ============================================
// HOVER TOOLTIP
// ============================================

function setupTooltips() {
    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    
    tooltipElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            const tooltip = this.querySelector('.tooltip');
            if (tooltip) {
                tooltip.classList.add('show');
            } else {
                const newTooltip = document.createElement('div');
                newTooltip.classList.add('tooltip', 'show');
                newTooltip.textContent = this.dataset.tooltip;
                this.appendChild(newTooltip);
            }
        });
        
        element.addEventListener('mouseleave', function() {
            const tooltip = this.querySelector('.tooltip');
            if (tooltip) {
                tooltip.classList.remove('show');
            }
        });
    });
}

// ============================================
// SCROLL ANIMATIONS
// ============================================

function setupScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'slide-up 0.6s ease forwards';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.card-engage, .stat-box, .list-item').forEach(el => {
        observer.observe(el);
    });
}

// ============================================
// BUTTON CLICK EFFECTS
// ============================================

function setupButtonAnimations() {
    const buttons = document.querySelectorAll('.btn-engage-primary, .btn-action, .btn-success, .btn-danger');
    
    buttons.forEach(button => {
        addRippleEffect(button);
        
        button.addEventListener('click', function(e) {
            // Add scale animation
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 100);
        });
    });
}

// ============================================
// LEADERBOARD HOVER EFFECTS
// ============================================

function setupLeaderboardAnimations() {
    const rows = document.querySelectorAll('.leaderboard-row');
    
    rows.forEach((row, index) => {
        row.style.animation = `bounce-in-left 0.5s ease`;
        row.style.animationDelay = `${index * 0.05}s`;
        
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
}

// ============================================
// FORM SUBMISSION ANIMATION
// ============================================

function setupFormAnimations() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                // Show loading spinner
                const originalText = submitButton.textContent;
                submitButton.disabled = true;
                submitButton.innerHTML = '<div class="spinner" style="display: inline-block; margin-right: 8px;"></div>Memproses...';
                
                // Will be reset by server on response
                form.addEventListener('loadend', function() {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                }, { once: true });
            }
        });
    });
}

// ============================================
// QUIZ PROGRESS ANIMATION
// ============================================

function updateQuizProgress(current, total) {
    const percentage = (current / total) * 100;
    const progressElements = document.querySelectorAll('.progress-fill');
    
    progressElements.forEach(element => {
        animateProgressBar(element.parentElement, percentage);
    });
}

// ============================================
// INITIALIZE ALL ANIMATIONS
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    // Setup all interactive elements
    setupQuizOptions();
    setupTooltips();
    setupButtonAnimations();
    setupLeaderboardAnimations();
    setupFormAnimations();
    setupScrollAnimations();
    
    // Add page entrance animation
    document.body.style.animation = 'fade-in 0.5s ease';
    
    // Log initialization
    console.log('✨ Student Engagement Animations Initialized!');
});

// ============================================
// UTILITY FUNCTIONS
// ============================================

// Trigger animations on specific events
window.celebrateSuccess = function() {
    triggerConfetti();
    showNotification('✅ Berhasil!', 'success');
};

window.showError = function(message) {
    showNotification(message || '❌ Terjadi Kesalahan', 'error');
};

window.triggerAchievement = function(message = 'Achievement Unlocked!') {
    triggerConfetti();
    showNotification('🏆 ' + message, 'success');
};

window.updateProgress = function(current, total) {
    updateQuizProgress(current, total);
};

// Export for use in other scripts
window.AnimationUtils = {
    confetti: triggerConfetti,
    counter: animateCounter,
    progress: animateProgressBar,
    achievement: celebrateAchievement,
    showNotification: showNotification,
    celebrateSuccess: window.celebrateSuccess,
    showError: window.showError,
    triggerAchievement: window.triggerAchievement
};
