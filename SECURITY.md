# Security Policy

## Reporting a vulnerability

Please do not open a public issue for security problems.

Email [security@hihaho.com](mailto:security@hihaho.com) with:

- A description of the issue.
- Steps to reproduce.
- The version you're running.
- The impact you think it has.

We'll acknowledge within two business days and follow up with a fix timeline.

## Supported versions

Security fixes land on the latest minor release. Older minors are not patched.

## Scope

This package generates and transforms PHP source code at build time. The realistic attack surface is small, but examples of in-scope issues:

- A rule producing code that executes attacker-controlled input.
- A rule reading files outside the project tree via crafted paths.
- A rule leaking secrets from the environment into generated code.

Out of scope: developer tooling issues that don't affect end users of the rewritten code.
