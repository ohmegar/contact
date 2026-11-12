.PHONY: init-network \
        dev-up dev-down dev-init dev-clean dev-logs \
        dev-wsl-up dev-wsl-down dev-wsl-init dev-wsl-clean dev-wsl-logs \
        prod-up prod-down prod-deploy prod-logs

init-network:
	@docker network create apps_network 2>/dev/null || true

# ==============================================================================
# Dev Environment B: Standard Commands (Windows Host)
# ==============================================================================

dev-up: init-network
	docker compose up -d --build

dev-down:
	docker compose down

dev-init:
	docker compose exec contact-app-dev composer install --prefer-dist --no-interaction
	docker compose exec contact-app-dev php artisan key:generate

dev-clean:
	docker compose exec contact-app-dev php artisan optimize:clear

dev-logs:
	docker compose logs -f contact-app-dev contact-nginx-dev

# ==============================================================================
# Dev Environment A: WSL2 Development Commands (Ubuntu on WSL2)
# ==============================================================================

dev-wsl-up: init-network
	docker compose -f docker-compose.wsl.yml up -d --build

dev-wsl-down:
	docker compose -f docker-compose.wsl.yml down

dev-wsl-init:
	docker compose -f docker-compose.wsl.yml exec -e HOME=/tmp contact-app-wsl git config --global --add safe.directory /var/www/contact
	docker compose -f docker-compose.wsl.yml exec -e COMPOSER_HOME=/tmp contact-app-wsl composer install --prefer-dist --no-audit --no-interaction
	docker compose -f docker-compose.wsl.yml exec contact-app-wsl php artisan key:generate

dev-wsl-clean:
	docker compose -f docker-compose.wsl.yml exec contact-app-wsl php artisan optimize:clear

dev-wsl-logs:
	docker compose -f docker-compose.wsl.yml logs -f contact-app-wsl contact-nginx-wsl

# ==============================================================================
# Production Environment Commands (Ubuntu Server)
# ==============================================================================

prod-up: init-network
	docker compose -f docker-compose.prod.yml up -d --build

prod-down:
	docker compose -f docker-compose.prod.yml down

prod-deploy: init-network
	docker compose -f docker-compose.prod.yml up -d --build
	docker compose -f docker-compose.prod.yml exec -T app php artisan optimize

prod-logs:
	docker compose -f docker-compose.prod.yml logs -f app nginx
