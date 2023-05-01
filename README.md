# network-automator
 
## To do List
- REFACTOR THE CODE, THE BLADES ARE A TOTAL MESS!
- - Index Pages Refactored.
- - Create Pages NOT Refactored.
- - Edit Pages NOT Refactored.
- - Show Pages NOT Refactored.
- Implement ICMP checks on device index page, for devices that have IPv4 and/or IPv6 configured;
- Start using SNMP check, could be on device.show page, why not give the option for interface and system graphics already?
- Impement restfull actions for device, device.group, device.vendor and device.model;
- Implement constant/configurable SNMP checks;
- Implement a interface for SSH commands;
- Implement a interface for SNMP write commands;
- Implement a interface for API checks (perhaps could be a better option than SNMP for some devices...);
- Implement triggers;
- Debug why destroy methods are not working;
- Change button pattern to gray instead of blue
- Add asset tag and serial number to devices
- Add API support

## Dont forget to
- In devices.index, add the search for device group and device model (foreign device keys)

## Diary
### 05/01/2023: Changes on Views and Controllers
- Added font awesome compiled node module
- General standarlization of view pages classes
- - Location.Index
- - Device.Index
- - Device.Vendor.Index
- - Device.Model.Index
- - Device.Group.Index
- Finished adding, removing or refactoring restfull actions relevant to each controller.
### 04/30/2023: Focus on controllers restfull actions
- Added/Refactored or Removed controllers RESTFULL actions (not finished)
### 04/28/2023: Focus on index pages search mechanisms
- Programed the search mechanisms in devices.x.index pages (with a dont forget to)
### 04/28/2023: Focus on frontend code aspect
- Refactor of view code into components
- Standarlization of code in devices.x.index
### 04/27/2023: Impelmentation of Devices Show page
- Implementation of device.show page.