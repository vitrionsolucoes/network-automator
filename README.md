# network-automator
 
## To do List
- REFACTOR THE CODE, THE BLADES ARE A TOTAL MESS!
- - Device.Index pages refactored
- - Device.Create pages NOT refactored
- - Device.Show pages NOT refactored
- - Device.Edit pages NOT refactored
- Implement ICMP checks on device index page, for devices that have IPv4 and/or IPv6 configured;
- Start using SNMP check, could be on device.show page, why not give the option for interface and system graphics already?
- Impement restfull actions for device, device.group, device.vendor and device.model;
- Implement constant/configurable SNMP checks;
- Implement a interface for SSH commands;
- Implement a interface for SNMP write commands;
- Implement a interface for API checks (perhaps could be a better option than SNMP for some devices...);
- Implement triggers;
- Debug why destroy methods are not working;

## Dont forget to
- In devices.index, add the search for device group and device model (foreign device keys)

## Diary
- 04/28/2023 - Programed the search mechanisms in devices.x.index pages (with a dont forget to)
- 04/28/2023 - Refactor of view code into components and standarlization of code of devices.x.index
- 04/27/2023 - Implementation of device.show page.