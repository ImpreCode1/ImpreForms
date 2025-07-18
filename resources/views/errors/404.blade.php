<!DOCTYPE html>
<html>
<head>
  <title>Enlace Expirado</title>
  <style>
      body {
          min-height: 100vh;
          background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 1rem;
          font-family: system-ui, -apple-system, sans-serif;
      }

      .content {
          text-align: center;
          padding: 2.5rem;
          background: rgba(255, 255, 255, 0.9);
          border-radius: 1rem;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
          backdrop-filter: blur(10px);
      }

      h1 {
          font-size: 4rem;
          font-weight: 800;
          color: #1F2937;
          margin-bottom: 1.5rem;
          text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      }

      p {
          font-size: 1.25rem;
          line-height: 1.75;
          color: #4B5563;
          max-width: 32rem;
          margin: 0 auto 2rem;
      }

      .back-link {
          display: inline-flex;
          align-items: center;
          color: #2563EB;
          font-weight: 500;
          padding: 0.75rem 1.5rem;
          border-radius: 0.5rem;
          background: rgba(37, 99, 235, 0.1);
          transition: all 0.2s ease;
      }

      .back-link:hover {
          color: #1D4ED8;
          background: rgba(37, 99, 235, 0.15);
          transform: translateY(-1px);
      }

      .back-link svg {
          width: 1.25rem;
          height: 1.25rem;
          margin-right: 0.75rem;
      }
  </style>
</head>
<body>
  <div class="content">
      <h1>¡Oops!</h1>
      <p>El enlace ha expirado o no es válido. Por favor, póngase en contacto con el administrador para restaurarlo.</p>
      {{-- <a href="/" class="back-link">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
          </svg>
          Volver al inicio
      </a> --}}
  </div>
</body>
</html>
