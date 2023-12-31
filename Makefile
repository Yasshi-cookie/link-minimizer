prettier:
	npm run prettier -- "app/**/*.php" "tests/**/*.php" --write

profile-mode:
	XDEBUG_MODE=profile docker compose up -d

profile-visualize:
	qcachegrind
