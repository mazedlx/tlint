## Tighten linter
> not psr stuff, these are conventions and agreed upon best practices

## Install
```
composer global install tighten/tlint
```

## Usage
```
tlint lint routes/ViewWithOverArrayParamatersExample.php
```

> output
```
Linting TestLaravelApp/routes/ViewWithOverArrayParamatersExample.php
============
Lints: 
============
! Prefer `view(...)->with(...)` over `view(..., [...])`.
5 : `    return view('test', ['test' => 'test']);``
```

## Implemented lints
- Use with over array parameters in view(). `ViewWithOverArrayParamaters`
- No leading slashes in namespaces or static calls or instantiations. `RemoveLeadingSlashNamespaces`
- Fully qualified class name only when it's being used a string (class name). `QualifiedNamesOnlyForClassName`
- Blade directive spacing conventions. `NoSpaceAfterBladeDirectives`, `SpaceAfterBladeDirectives`
- Don’t use environment variables directly in code; instead, use them in config files and call config vars from code. `UseConfigOverEnv`
- There should only be rest methods in an otherwise purely restful controller. `PureRestControllers`
- Controller method order (rest methods follow docs). `RestControllersMethodOrder`
- Use the simplest `request(...)` wherever possible. `RequestHelperFunctionWherePossible`
- Use auth() helper over the Auth facade. `UseAuthHelperOverFacade`
- Remove method docblocks in migrations. `NoDocBlocksForMigrationUpDown`

## Todo Lints
- Mailable values (from and subject etc) should be set in build() not constructor.
- import facades (don't use aliases). `ImportFacades`
- alphabetize use statements.
- Model method order (props, relationships, scopes, accessors, mutators, custom, boot).
- Class "things" order (consts, statics, props, traits, methods).
- no leading slashes on route paths.
- minimize number of public methods on controllers (8?).
- apply middleware in routes (not controllers).
