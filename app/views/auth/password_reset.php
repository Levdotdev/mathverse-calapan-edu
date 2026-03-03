<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MathVerse | Password Reset</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@500;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link href="<?=base_url();?>public/css/main.css" rel="stylesheet">
    <link href="<?=base_url();?>public/css/auth.css" rel="stylesheet">
</head>
<body class="flex flex-col items-center justify-center p-4 min-h-screen">
    <div class="stars-container"></div>
    <div class="digital-rain"></div>
    <div class="cyber-grid"></div>
    <div id="particle-container"></div>

    <div class="w-full max-w-sm z-20">
        <div class="portal-frame">
            <div class="corner top-0 left-0 border-r-0 border-b-0"></div>
            <div class="corner top-0 right-0 border-l-0 border-b-0"></div>
            <div class="corner bottom-0 left-0 border-r-0 border-t-0"></div>
            <div class="corner bottom-0 right-0 border-l-0 border-t-0"></div>

            <div class="p-6 pb-8">
                <div id="forgotMod" class="module module-active">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-orbitron font-black text-white uppercase tracking-wider leading-tight">FORGOT PASSWORD</h2>
                            <p class="text-cyan-400 font-mono text-[9px] tracking-widest mt-1 uppercase font-bold">Access Restoration</p>
                        </div>
                        <i class="fas fa-key-skeleton text-3xl text-cyan-500/20"></i>
                    </div>

                    <p class="text-slate-400 text-[10px] uppercase tracking-widest leading-relaxed mb-6 font-medium">
                        Enter your email address and we'll send you a link to reset your password.
                    </p>

                    <form id="forgot-form" method="POST" class="space-y-5" action="<?=site_url('auth/password-reset');?>" autocomplete="off">
                        <?php csrf_field(); ?>
                        <div class="space-y-1.5 relative">
                            <label class="text-cyan-400 text-[10px] font-bold uppercase tracking-[0.15em] ml-1">Email Address</label>
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                                <?php $LAVA =& lava_instance(); ?>
                                <input id="email" type="email" class="form-control <?=$LAVA->session->flashdata('alert');?> input-mobile-ultra" name="email" placeholder="Email Address" required autocomplete="off"/>
                            </div>
                            <?php if($LAVA->session->flashdata('error')): ?>
                                <p class="text-red-500 text-xs">
                                    <?= $LAVA->session->flashdata('error'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn-mobile-ultra cyan-900 mt-2">
                            <span class="text-md">Send Password Reset Link</span>
                            <i class="fas fa-paper-plane text-sm"></i>
                        </button>
                    </form>
                    <button onclick="location.href='<?=site_url('auth/login');?>'" class="mt-8 w-full text-slate-500 text-[9px] font-black uppercase tracking-[0.2em] flex items-center justify-center gap-2">
                        <i class="fas fa-chevron-left text-xs"></i> Return to Login
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
