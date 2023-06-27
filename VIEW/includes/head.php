<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<script>
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>

<script>
  tailwind.config = {
    darkMode: 'class',
  }
</script>

<link rel="icon" type="image/png" href="../../image/piscina.png" />

